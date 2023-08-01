<?php
require_once 'leaveClass.php';
require_once 'functions.php';

$obj = new leaveClass();
$con = new functions();

$department = $obj->getdep('department', $_SESSION['department']);
$positions =$obj->allpos('dep_id', $department['dep_id']);
$errors = array();

$info = array();

if (isset($_POST['add_pos'])) {
    $check_name = trim(htmlentities($_POST['position']));
    $id = trim($_POST['position_id']);
    if (array_search($check_name, array_column($positions, 'position')) !== false) {
        $errors['position'] = "This name already exists";
    } else {
        $arr = [
            'pos_id' => $id,
            'dep_id' => $department['dep_id'],
            'position' => $check_name
        ];
        $dept = $obj->add_position($arr);
        if ($dept !== false) {
            $info['position'] = "position added successfully!";
            ?>
            <script>
                setTimeout(function() {
                    window.location.href = "http://localhost/myproject/admin/positions.php";
                }, 2000);
            </script>
        <?php
        }
    }
}

if (isset($_POST['update_pos'])) {
    $check_name = trim(htmlentities($_POST['position']));
    $pos_id = trim($_POST['position_id']);
    $id = $_POST['posid'];
    if (array_search($check_name, array_column($positions, 'position')) !== false) {
        $errors['position'] = "Position already exists";
    } else {
        $arr = [
            'pos_id' => $pos_id,
            'position' => $check_name
        ];
        $pos = $obj->updateposition($arr, $id);
        if ($pos !== false) {
            $info['position'] = "position updated successfully!";
        ?>
            <script>
                setTimeout(function() {
                    window.location.href = "http://localhost/myproject/admin/position1.php";
                }, 2000);
            </script>
<?php
        }
    }
}

if (isset($_POST['change_pos'])) {
    $position = trim($_POST['position']);
    $id = $_POST['idno'];

        $arr = [
            'position' => $position
        ];
        $pos = $con->update($arr, $id);
        if ($pos !== false) {
            header('location: ../admin/employees.php');
        
    }
}
