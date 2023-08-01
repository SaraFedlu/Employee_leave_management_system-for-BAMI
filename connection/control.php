<?php
require('formValidator.php');
require_once 'functions.php';
require_once 'leaveClass.php';

$obj = new leaveClass();
$departments = $obj->departments();
$errors = array();
$data = [
    'fname' => '', 'lname' => '', 'mname' => '', 'idno' => '', 'phone' => '',
    'email' => '', 'region' => '', 'zone' => '', 'woreda' => '', 'locality' => '',
    'contactfname' => '', 'contactlname' => '', 'contactphone' => '', 'gender' => '',
    'empyear' => '', 'empstatus' => '', 'department' => '', 'avleave' => '', 'position' => ''
];
$info = array();

if (isset($_POST['submit'])) {

    $obj = new formValidator($_POST, $_FILES);
    $obj->validateForm();

    $err = $obj->retError();
    $data = $obj->retData();

    if (!empty($err)) {
        $errors = $err;
    } else {
        $con = new functions();

        $arr = [
            'firstname' => $data['fname'],
            'lastname' => $data['lname'],
            'middlename' => $data['mname'],
            'idno' => $data['idno'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'photo' => $data['photo'],
            'avleave' => $data['avleave'],
            'empyear' => $data['empyear'],
            'empstatus' => $data['empstatus'],
            'department' => $data['department'],
            'position' => $data['position'],
            'region' => $data['region'],
            'zone' => $data['zone'],
            'woreda' => $data['woreda'],
            'locality' => $data['locality'],
            'emergencyfirstname' => $data['contactfname'],
            'emergencylastname' => $data['contactlname'],
            'emergencyCon_phone' => $data['contactphone'],
            'password' => $data['password'],
        ];

        $x = $con->check('idno', $arr['idno']);
        if ($x > 0) {

            $errors['idno'] = "this person has been already registered";
        } else {

            $photo = $_FILES['photo'];
            $image = $con->uploadphoto($photo);
            if (empty($image)) {
                $errors['photo'] = "error uploading photo";
                return;
            } else {
                $arr['photo'] = $image;
            }

            $playerid = $con->add($arr);


            if (!empty($playerid)) {
                $player = $con->getrow('id', $playerid);
                // print_r($player);

                $info['add'] = "successfully added";
            } else {
                $errors['idno'] = "error occured";
            }
        }
    }
}

if (isset($_POST['update'])) {

    $obj = new formValidator($_POST, $_FILES);
    $obj->validateForm2();

    $err = $obj->retError();
    $data = $obj->retData();

    if (!empty($err)) {
        $errors = $err;
    } else {
        $con = new functions();

        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo'];
            $image = $con->uploadphoto($photo);
            if (empty($image)) {
                $errors['photo'] = "error uploading photo";
                return;
            } else {
                $data['photo'] = $image;
            }
        } else {
            $data['photo'] = $_SESSION['photo'];
        }
        $arr = [
            'firstname' => $data['fname'],
            'lastname' => $data['lname'],
            'middlename' => $data['mname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'photo' => $data['photo'],
            'department' => $data['department'],
            'region' => $data['region'],
            'zone' => $data['zone'],
            'woreda' => $data['woreda'],
            'locality' => $data['locality'],
            'emergencyfirstname' => $data['contactfname'],
            'emergencylastname' => $data['contactlname'],
            'emergencyCon_phone' => $data['contactphone'],
        ];


        $updated = $con->update($arr, $_SESSION['idno']);
        if ($updated) {
            $d = $con->getrow('idno', $_SESSION['idno']);
            if (!empty($d)) {
                $_SESSION = $d;
                $info['idno'] = "successfully updated!";
            }
        }
    }
}

if (isset($_POST['change'])) {
    $old = trim($_POST['opw']);
    $new = trim($_POST['npw']);
    $confirm = trim($_POST['cpw']);

    if (empty($old) || empty($new) || empty($confirm)) {
        $errors['password'] = "All fields are required.";
    } else {
        if (!password_verify($old, $_SESSION['password'])) {
            $errors['password'] = "Incorrect Password.";
            return;
        }
        if ($new !== $confirm) {
            $errors['password'] = "Passwords don't match.";
        } else {
            $con = new functions();

            $update = $con->updatepwd(password_hash($new, PASSWORD_BCRYPT), $_SESSION['idno']);
            if ($update) {
                $result = $con->getrow('idno', $_SESSION['idno']);
                if (!empty($result)) {
                    $_SESSION['password'] = $result['password'];
                    $info['password'] = "Password successfully updated!";
                }
            }
        }
    }
}

// retrieve data from database as admin
if (!empty($_SESSION) && $_SESSION['user_type'] == 'admin') {
    $con = new leaveClass();
    $all_leaves = $con->getrows();
    $all_employees = $con->employees();
    $dep = $con->getdep('department', $_SESSION['department']);
    $positions =$con->allpos('dep_id', $dep['dep_id']);
    $leaves = [];
    $pending = [];
    $approved = [];
    $onleave = [];
    $employees = [];
    foreach ($all_leaves as $value) {
        if ($value['department'] == $_SESSION['department']) {
            array_push($leaves, $value);

            if ($value['status'] == 'pending') {
                array_push($pending, $value);
            }

            if ($value['status'] == 'Approved') {
                array_push($approved, $value);

                $dateBegin = date('Y-m-d', strtotime($value['start_date']));
                $dateEnd = date('Y-m-d', strtotime($value['end_date']));

                if ((date('Y-m-d') >= $dateBegin) && (date('Y-m-d') < $dateEnd)) {
                    array_push($onleave, $value);
                }
            }
        }
    }

    foreach ($all_employees as $value) {
        if ($value['department'] == $_SESSION['department']) {
            array_push($employees, $value);
        }
    }
    $total_leaves = count($leaves);
    $pending_leaves = count($pending);
    $c = count($onleave);
    $total = count($employees);
}

// retrieve data from database as superadmin
if (!empty($_SESSION) && $_SESSION['user_type'] == 'sup') {
    $con = new leaveClass();
    $leaves = $con->getrows();
    $employees = $con->employees();
    $onprogress = [];
    $approved = [];
    $onleave = [];
    $employee_no = count($employees);
    $limit = date('Y-m-d', mktime(0, 0, 0, 7, 8, date("Y") + 1));
    foreach ($leaves as $value) {
        if (date('Y-m-d', strtotime($value['application_date'])) >= date('Y-08-07') && date('Y-m-d', strtotime($value['application_date'])) <= $limit) {
            if ($value['status'] == 'On progress') {
            array_push($onprogress, $value);
        }

        if ($value['status'] == 'Approved') {
            array_push($approved, $value);

            $dateBegin = date('Y-m-d', strtotime($value['start_date']));
            $dateEnd = date('Y-m-d', strtotime($value['end_date']));

            if ((date('Y-m-d') >= $dateBegin) && (date('Y-m-d') < $dateEnd)) {
                array_push($onleave, $value);
            }
        }
    }
    }
    $onprogress_leaves = count($onprogress);
    $c = count($onleave);
    $total_leaves = $onprogress_leaves + count($approved);
    $all_leaves = array_merge($onprogress, $approved);
}
