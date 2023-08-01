<?php
require('formValidator.php');
require_once 'leaveClass.php';
require_once 'functions.php';

$app = new formValidator($_POST, []);
$con = new leaveClass();
$obj = new functions();

$errors = array();
$info = array();
$data = array();
$results = $con->getLeaveHis('idno', $_SESSION['idno']);

if (isset($_POST['apply'])) {
    //validation
    $app->validateLeave();

    $err = $app->retError();
    $data = $app->retData();

    if (!empty($err)) {
        $errors = $err;
    } else {
        // range validation
        $date1 = date('Y-m-d', strtotime($data['from']));
        $date2 = date('Y-m-d', strtotime($data['to']));

        foreach ($results as $result) {
            $dateBegin = date('Y-m-d', strtotime($result['start_date']));
            $dateEnd = date('Y-m-d', strtotime($result['end_date']));

            if (($date1 >= $dateBegin) && ($date1 <= $dateEnd) || ($date2 >= $dateBegin) && ($date2 <= $dateEnd)) {
                $errors['error'] = "You have already applied on this days.";
                return;
            }
        }
        // frequency
        $y = [];
        $limit = date('Y-m-d', mktime(0, 0, 0, 7, 8, date("Y") + 1));

        foreach ($results as $value) {
            // checking if application date is in range of y-08-07 and (y+1)-08-07
            if (date('Y-m-d', strtotime($value['application_date'])) >= date('Y-08-07') && date('Y-m-d', strtotime($value['application_date'])) <= $limit) {
                array_push($y, $value);
            }
        }
        if (array_search('Approved', array_column($y, 'status')) !== false) {
            $x = array_count_values(array_column($y, 'status'))['Approved'];

            if ($x >= 2) {
                $errors['error'] = "You can't apply more than twice a year.";
                return;
            }
        }
        // everything ok

        if ($_SESSION['user_type'] == 'emp') {
            $arr = [
                'idno' => $_SESSION['idno'],
                'start_date' => $data['from'],
                'end_date' => $data['to'],
                'total' => $data['total'],
                'leave_type' => $data['leavetype'],
                'status' => 'pending',
            ];
        } elseif ($_SESSION['user_type'] == 'admin') {
            $arr = [
                'idno' => $_SESSION['idno'],
                'start_date' => $data['from'],
                'end_date' => $data['to'],
                'total' => $data['total'],
                'leave_type' => $data['leavetype'],
                'status' => 'On progress',
            ];
        } else {
            $arr = [
                'idno' => $_SESSION['idno'],
                'start_date' => $data['from'],
                'end_date' => $data['to'],
                'total' => $data['total'],
                'leave_type' => $data['leavetype'],
                'status' => 'Approved',
            ];
        }

        $res = $con->applyLeave($arr);

        if ($res !== false && !empty($res)) {


            $left = $_SESSION['avleave'] - $arr['total'];

            if ($obj->updateAvLv($left, $arr['idno'])) {

                $player = $obj->getrow('idno', $_SESSION['idno']);
                $_SESSION = $player;
                $info['apply'] = "Request successfully sent";
            }
        }
    }
}

// approve by admin
if (isset($_POST['approve1'])) {
    $arr = [
        'admin_comment' => testdata($_POST['response1']),
        'status' => 'On progress',
    ];
    $con->update($arr, $_POST['userid']);

    header('location: ../admin/all_leaves.php');
}

if (isset($_POST['reject1'])) {
    $arr = [
        'admin_comment' => testdata($_POST['response1']),
        'status' => 'Rejected',
    ];
    $result = $con->update($arr, $_POST['userid']);

    header('location: ../admin/all_leaves.php');
}

// approve by super admin
if (isset($_POST['approve2'])) {
    $arr = [
        'sup_comment' => testdata($_POST['response2']),
        'status' => 'Approved',
    ];
    $con->update($arr, $_POST['userid']);

    header('location: ../admin_super/all_leaves.php');
}

if (isset($_POST['reject2'])) {
    $arr = [
        'sup_comment' => testdata($_POST['response2']),
        'status' => 'Rejected',
    ];
    $result = $con->update($arr, $_POST['userid']);

    header('location: ../admin_super/all_leaves.php');
}

function testdata($var)
{
    $var1 = trim($var);
    $var2 = htmlentities($var1);
    $var3 = strip_tags($var2);
    return $var3;
}

$y = 0;
for ($year = $_SESSION['empyear'] + 1; $year <= date('Y'); $year++) {
    $y++;
    // the year ends by sene 30 E.C
    if (date('m-d') == '08-08') {
        $_SESSION['avleave'] = 14 + $y;
        $obj->updateAvLv($_SESSION['avleave'], $_SESSION['idno']);
    }
}
