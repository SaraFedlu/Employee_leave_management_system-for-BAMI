<?php
require('formValidator.php');
require_once 'functions.php';
require_once 'leaveClass.php';

$obj = new leaveClass();
$departments = $obj->departments();
$errors = array();

$info = array();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $con = new functions();
    $data = $con->getrow('id', $id);
    $data = [
        'fname' => $data['firstname'], 'lname' => $data['lastname'], 'mname' => $data['middlename'],
        'idno' => $data['idno'], 'phone' => $data['phone'], 'email' => $data['email'], 'gender' => $data['gender'],
        'empyear' => $data['empyear'], 'department' => $data['department'], 'avleave' => $data['avleave'],
        'user_type' => $data['user_type'], 'photo' => $data['photo'], 'id' => $data['id']
    ];
} else {
    $data = [
        'fname' => '', 'lname' => '', 'mname' => '', 'idno' => '', 'phone' => '', 'id' => '',
        'email' => '', 'region' => '', 'zone' => '', 'woreda' => '', 'locality' => '', 'user_type'=>'',
        'contactfname' => '', 'contactlname' => '', 'contactphone' => '', 'gender' => '',
        'empyear' => '', 'empstatus' => '', 'department' => '', 'avleave' => '', 'position' => ''
    ];
}

if (isset($_POST['add_emp'])) {

    if (empty($_POST['id'])) {
        $data = [
            'fname' => $_POST['fname'], 'lname' => $_POST['lname'], 'mname' => $_POST['mname'], 'idno' => $_POST['idno'], 'phone' => $_POST['phone'],
            'email' => $_POST['email'], 'region' => 'none', 'zone' => 'none', 'woreda' => 'none', 'locality' => 'none', 'photo' => 'male.png',
            'contactfname' => 'none', 'contactlname' => 'none', 'contactphone' => '0000000000', 'gender' => $_POST['gender'],
            'empyear' => $_POST['empyear'], 'empstatus' => 'permanent', 'department' => $_POST['department'], 'avleave' => $_POST['avleave'], 'position' => 'none',
            'password' => 'none', 'cpassword' => 'none', 'user_type' => $_POST['user_type']
        ];


        $obj = new formValidator($data, []);
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
                'photo' => $data['photo'],
                'user_type' => $data['user_type'],
                'email' => $data['email'],
                'gender' => $data['gender'],
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

                $playerid = $con->add($arr);


                if (!empty($playerid)) {
                    $player = $con->getrow('id', $playerid);
                    // print_r($player);

                    $info['add'] = "successfully added";
?>
                    <script>
                        setTimeout(function() {
                            window.location.href = "http://localhost/myproject/admin_super/create_emp.php";
                        }, 2000);
                    </script>
            <?php
                } else {
                    $errors['idno'] = "error occured";
                }
            }
        }
    } else {

        $con = new functions();
        $d =$con->getrow('id', $_POST['id']);
        $data=array_merge($d, $_POST);
        $data['contactfname'] = $d['emergencyfirstname'];
        $data['contactlname'] = $d['emergencylastname'];
        $data['contactphone'] = $d['emergencyCon_phone'];

        $obj = new formValidator($data, []);
        $obj->validateForm3();

        $err = $obj->retError();
        $data = $obj->retData();

        unset($err['contactphone'], $err['cfullname'], $err['empstatus']);
        $err = array_values($err);

        if (!empty($err)) {
            $errors = $err;
        } else {

            $arr = [
                'firstname' => $data['fname'],
                'lastname' => $data['lname'],
                'middlename' => $data['mname'],
                'idno' => $data['idno'],
                'phone' => $data['phone'],
                'user_type' => $data['user_type'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'avleave' => $data['avleave'],
                'empyear' => $data['empyear'],
                'department' => $data['department']
            ];

            $playerid = $con->update($arr, $data['idno']);


            if ($playerid) {
                $info['add'] = "Successfully Updated";
            } else {
                $errors['idno'] = "error occured";
            }
        }
    }
}


if (isset($_POST['add_dep'])) {
    $check_name = trim(htmlentities($_POST['department']));
    $id = trim($_POST['department_id']);
    if (array_search($check_name, array_column($departments, 'department')) !== false) {
        $errors['department'] = "This name already exists";
    } else {
        $arr = [
            'dep_id' => $id,
            'department' => $check_name
        ];
        $dept = $obj->add_department($arr);
        if ($dept !== false) {
            $info['department'] = "department added successfully!";
            ?>
            <script>
                setTimeout(function() {
                    window.location.href = "http://localhost/myproject/admin_super/create_dep.php";
                }, 2000);
            </script>
        <?php
        }
    }
}

if (isset($_POST['update_dep'])) {
    $check_name = trim(htmlentities($_POST['department']));
    $dep_id = trim($_POST['department_id']);
    $id = $_POST['depid'];
    if (array_search($check_name, array_column($departments, 'department')) !== false) {
        $errors['department'] = "Department already exists";
    } else {
        $arr = [
            'dep_id' => $dep_id,
            'department' => $check_name
        ];
        $dept = $obj->updatedepartment($arr, $id);
        if ($dept !== false) {
            $info['department'] = "department updated successfully!";
        ?>
            <script>
                setTimeout(function() {
                    window.location.href = "http://localhost/myproject/admin_super/departments.php";
                }, 2000);
            </script>
<?php
        }
    }
}
