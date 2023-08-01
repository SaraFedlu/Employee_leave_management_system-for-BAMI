<?php
session_start();
$action = $_REQUEST['action'];


    require_once 'leaveClass.php';
    require_once 'functions.php';
    $obj = new leaveClass();
    $con = new functions();


//-----------ajax queries------------//

//getcountof function and getalldata action

if($action=='getalldata') {

    $data=$obj->getLeaveHis('idno', $_SESSION['idno']);
    if(!empty($data)) {
        $datalist=$data;
    } else {
        $datalist=[];
    }
    $upTodate = $con->getrow('idno', $_SESSION['idno']);
    $_SESSION= $upTodate;
    $dataArr=['data'=>$datalist, 'session'=>$upTodate];
    echo json_encode($dataArr);
    exit();

}

//perform deleting
if($action=='deleteuser') {

    $userId= (!empty($_GET['id'])) ? $_GET['id'] : '';
    $status= $obj->getrow('id', $userId);
    $isdeleted= "";
     if($status['status'] !== "Approved") {
        $isdeleted=$obj->deleteRow($userId);
    }
    if ($isdeleted) {

        $left = $status['total'] + $_SESSION['avleave'];
        $con->updateAvLv($left, $_SESSION['idno']);
        $displaymessage=['delete'=>1, 'session' => $left];

    } elseif($status['status'] == "Approved") {

        $displaymessage= ['delete'=>2];

    } else {
        $displaymessage=['delete'=>0];
    }
    echo json_encode($displaymessage);
    exit();

}

// action to perform editing
if ($action=="editusersdata") {
    $playerid = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if(!empty($playerid)){
        $user = $obj->getrow('id', $playerid);
        echo json_encode($user);
        exit();
    }
}

if ($action=="viewusersdata") {
    $playerid = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if(!empty($playerid)){
        $user = $con->getrow('id', $playerid);
        echo json_encode($user);
        exit();
    }
}

if ($action=="fetchdep") {
    $playerid = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if(!empty($playerid)){
        $dep = $obj->getdep('department', $playerid);
        $pos = $obj->allpos('dep_id', $dep['dep_id']);
        $data=['dep' => $dep['department'], 'pos' => $pos];
        echo json_encode($data);
        exit();
    }
}

if ($action=="editdep") {
    $playerid = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if(!empty($playerid)){
        $dep = $obj->getdep('id', $playerid);
        echo json_encode($dep);
        exit();
    }
}

if ($action=="editpos") {
    $playerid = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if(!empty($playerid)){
        $pos = $obj->getpos('id', $playerid);
        echo json_encode($pos);
        exit();
    }
}

//--------------- Non-Ajax actions------------------//

// Deletion

if($_GET['del']!=NULL)
{
	$d=$_GET['del'];
    $con->deleteRow($d);
    $obj->deleteRow($d);
	header("location:../admin_super/all_employees.php");
}

if($_GET['dep']!=NULL)
{
	$d=$_GET['dep'];
    $obj->deleteDep($d);
	header("location:../admin_super/departments.php");
}

if($_GET['pos']!=NULL)
{
	$p=$_GET['pos'];
    $obj->deletePos($p);
	header("location:../admin/position1.php");
}