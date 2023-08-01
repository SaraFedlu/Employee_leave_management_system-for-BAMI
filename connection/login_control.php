<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email, $reset_token)
{

    require('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
    require('../vendor/phpmailer/phpmailer/src/Exception.php');
    require('../vendor/phpmailer/phpmailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sarahfedlu@gmail.com';
        $mail->Password   = 'emsvbxvjeihllvws';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('sarahfedlu@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset code';
        $mail->Body    = "we got a request form you to reset Password! <br>Insert the code bellow: <br>
                          $reset_token";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

require_once 'functions.php';

$err = array();
$info = array();


if (isset($_POST['log']) && $_POST['log'] === 'logged') {

    $empid = test_data($_POST['empid']);
    $pwd = test_data($_POST['pwd']);

    if (empty($empid)) {
        $err['error'] = "please enter your id number";
    } else {
        if (!preg_match('/^[0-9]{6,6}$/', $empid)) {
            $err['error'] = "please enter valid id number";
        }
    }

    if (!empty($err)) {
        echo json_encode($err);
    } else {
        $obj = new functions();
        $pass = $obj->infoCheck($empid);

        if (!password_verify($pwd, $pass)) {
            $info['login'] = "incorrect id or password";
            echo json_encode($info);
        } else {
            $_SESSION = $obj->getrow('idno', $empid);
            $type = $_SESSION['user_type'];
            $arr = ['data' => $_SESSION, 'type' => $type];
            echo json_encode($arr);
        }
    }
}

if (isset($_POST['request']) && $_POST['request'] === 'sent') {
    $reqid = test_data($_POST['codereqid']);

    if (empty($reqid)) {
        $err['err'] = "please enter your id number";
    } else {
        if (!preg_match('/^[0-9]{6,6}$/', $reqid)) {
            $err['err'] = "please enter valid id number";
        }
    }

    if (!empty($err)) {
        echo json_encode($err);
    } else {
        $obj = new functions();
        $id = $obj->check('idno', $reqid);

        if ($id != 1) {
            $info['log'] = "id not found, please check and try again";
            echo json_encode($info);
        } else {

            $address = $obj->passRecover($reqid);
            $code = rand(999999, 111111);
            $expFormat = mktime(
                date("H"),
                date("i"),
                date("s"),
                date("m"),
                date("d") + 1,
                date("Y")
            );
            $expDate = date("Y-m-d H:i:s", $expFormat);
            $arr = [
                'resettoken' => $code,
                'tokenexpdate' => $expDate
            ];

            $update = $obj->update($arr, $reqid);

            if ($update && sendmail($address['email'], $code)) {
                echo json_encode($reqid);
            }
        }
    }
}

if (isset($_POST['verify'])) {
    $resetcode = test_data($_POST['rstcode']);

    if (empty($resetcode)) {
        $err['err'] = "please enter the reset code sent to your email address.";
    } else {
        $obj = new functions();
        if ($obj->check('resettoken', $resetcode) !== 1) {
            $err['err'] = "invalid code!";
        }
    }

    if (!empty($err)) {
        echo json_encode($err);
    } else {
        $validate = $obj->getrow('resettoken', $resetcode);

        if ($validate['tokenexpdate'] < date("Y-m-d H:i:s")) {
            $info['log'] = "code expired, please try again";
            echo json_encode($info);
        } else {

            echo json_encode($_POST['verify']);
        }
    }
}

if (isset($_POST['recover'])) {
    $change = test_data($_POST['chngpw']);
    $confirm = test_data($_POST['confpw']);

    if (empty($change) || empty($confirm)) {
        $err['err'] = "Both fields are mandatoy.";
    } else {
        if ($change !== $confirm) {
            $err['err'] = "Passwords don't match.";
        }
    }

    if (!empty($err)) {
        echo json_encode($err);
    } else {
        $con = new functions();

        $update = $con->updatepwd(password_hash($change, PASSWORD_BCRYPT), $_POST['recover']);
        if ($update) {
            echo json_encode('Password successfully updated!');
        }
    }
}

function test_data($value)
{
    $value1 = trim($value);
    $value2 = stripslashes($value1);
    $value3 = htmlspecialchars($value2);

    return $value3;
}
