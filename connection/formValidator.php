<?php

class formValidator
{
    private $data;
    private $errors = [];
    private static $fields = ['fname', 'lname', 'mname', 'idno', 'phone', 'email', 'gender', 'photo', 'avleave', 'empyear', 'empstatus', 'department', 'position', 'region', 'zone', 'woreda', 'locality', 'contactfname', 'contactlname', 'contactphone', 'password'];
    private static $fields2 = ['fname', 'lname', 'mname', 'phone', 'email', 'photo', 'department', 'region', 'zone', 'woreda', 'locality', 'contactfname', 'contactlname', 'contactphone'];
    private static $fields3 = ['from', 'to', 'avleave', 'total', 'leavetype'];
    private static $fields4 = ['fname', 'lname', 'mname', 'phone', 'email',  'department', 'user_type', 'avleave', 'empyear', 'gender', 'idno'];

    public function __construct($post_data, $file_data)
    {
        $this->data = array_merge($post_data, $file_data);
    }
    public function validateForm()
    {


        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field isn't present");
                return;
            }
        }
        $this->validatePhoto();
        $this->validateName();
        $this->validateId();
        $this->validateEmail();
        $this->validateSelection();
        $this->validatePhone();
        $this->validatePassword();
        $this->validateAddress();
    }

    public function validateForm2()
    {
        foreach (self::$fields2 as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field isn't present");
                return;
            }
        }
        $this->validatePhoto();
        $this->validateEmail();
        $this->validatePhone();
        $this->validateName();
        $this->validateAddress();
    }

    public function validateForm3()
    {
        foreach (self::$fields4 as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field isn't present");
                return;
            }
        }
        $this->validateEmail();
        $this->validateId();
        $this->validatePhone();
        $this->validateName();
        $this->validateSelection();
    }

    public function validateLeave()
    {
        foreach (self::$fields3 as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field isn't present");
                return;
            }
        }
        $this->validateDate();
        $this->validateLeavetype();
    }

    public function retError()
    {
        return $this->errors;
    }

    public function retData()
    {
        return $this->data;
    }

    private function validateDate()
    {
        $var1 = $this->data['from'];
        $var2 = $this->data['to'];
        $var3 = $this->data['avleave'];

        if (empty($var1) || empty($var2)) {
            $this->addError('date', 'please select date interval');
        } else {

            $dateform1 = str_replace('/', '-', $var1);
            $dateform2 = str_replace('/', '-', $var2);
            $startdate = date('d-m-Y', strtotime($dateform1));
            $enddate = date('d-m-Y', strtotime($dateform2));

            function isValid($date, $format = 'd-m-Y'){
                $dt = DateTime::createFromFormat($format, $date);
                return $dt && $dt->format($format) === $date;
              }

            if(!preg_match('/^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$/', $var1) || !preg_match('/^(((((1[26]|2[048])00)|[12]\d([2468][048]|[13579][26]|0[48]))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|[12]\d))))|((([12]\d([02468][1235679]|[13579][01345789]))|((1[1345789]|2[1235679])00))-((((0[13578]|1[02])-(0[1-9]|[12]\d|3[01]))|((0[469]|11)-(0[1-9]|[12]\d|30)))|(02-(0[1-9]|1\d|2[0-8])))))$/', $var2) || !isValid($startdate) || !isValid($enddate)){
                $this->addError('date', 'invalid date.');
            return;
            }

            $date1 = date_create(date('d-m-Y'));
            $date2 = date_create($startdate);
            $date3 = date_create($enddate);

            // diff b/n current date and start date
            $diffInt1 = date_diff($date1, $date2);
            $diff1 = $diffInt1->format("%R%a");

            // diff b/n start and end date
            $diffInt2 = date_diff($date2, $date3);
            $diff2 = $diffInt2->format("%R%a");

             if(abs($diff1) > 30){
                $this->addError('date', 'start date after 30 days is not allowed.');
            }
            if($diff1 < 0){
                $this->addError('date', 'start date before today is not allowed.');
            }
            elseif ($diff2 < 1){
                $this->addError('date', 'You didn\'t enter valid interval.');
            }
            elseif($diff2 > $var3){
                $this->addError('date', 'You don\'t have this much days.');
            } 
            else{
                $this->addData('from', $startdate);
                $this->addData('to', $enddate);
                $this->addData('total', $diffInt2->format("%a"));
            }
            
        }
    }

    private function validateLeavetype()
    {
        $leavetype = $this->test_data($this->data['leavetype']);
        $other = $this->test_data($this->data['comment']);

        if(empty($leavetype)){
            $this->addError('leavetype', 'Please select leave type.');
        }
        else{
            if($leavetype == "other"){
                $this->addData('leavetype', $other);
            } else{
                $this->addData('leavetype', $leavetype);
            }
        }
    }


    private function validatePhoto()
    {

        $file = $this->data['photo'];

        if (!empty($file['name'])) {

           // $filetemppath = $file['tmp_name'];
            $filename = $this->test_data($file['name']);
           // $filetype = $file['type'];
            $filenamecmps = explode('.', $filename);
            $file_extension = strtolower(end($filenamecmps));
           // $newfilename = md5(time() . $filename) . '.' . $file_extension;
            $allowedextn = ["png", "jpg", "jpeg"];

            if (!in_array($file_extension, $allowedextn)) {

                $this->addError('photo', 'Only image files are allowed');
            } else if (($file['size'] > 2000000)) {
                $this->addError('photo', 'that\'s too large! only up to 2mb is allowed');

            }else {
                    $this->addData('photo', $filename);
                }
        }
    }

    private function test_data($value)
    {
            $value1 = trim($value);
            $value2 = stripslashes($value1);
            $value3 = htmlspecialchars($value2);
        
        return $value3;
    }

    private function validateName()
    {
        $val1 = $this->test_data($this->data['fname']);
        $val2 = $this->test_data($this->data['lname']);
        $val3 = $this->test_data($this->data['mname']);

        $cname1 = $this->test_data($this->data['contactfname']);
        $cname2 = $this->test_data($this->data['contactlname']);


        if (empty($val1) || empty($val2) || empty($val3)) {
            $this->addError('fullname', 'Please enter your full name');
        } else {
            if (!preg_match('/^[a-zA-Z]+$/', $val1) || !preg_match('/^[a-zA-Z]+$/', $val2) || !preg_match('/^[a-zA-Z]+$/', $val3)) {
                $this->addError('fullname', 'Please enter valid name');
            } else {
                $this->addData('fname', $val1);
                $this->addData('lname', $val2);
                $this->addData('mname', $val3);
            }
            }
            if (empty($cname1) || empty($cname2)) {
                $this->addError('cfullname', 'Please enter fullname');
            } else {
                if (!preg_match('/^[a-zA-Z]+$/', $cname1) || !preg_match('/^[a-zA-Z]+$/', $cname2)) {
                    $this->addError('cfullname', 'Please enter valid name');
                } else {
                    $this->addData('contactfname', $cname1);
                    $this->addData('contactlname', $cname2);
                }
            }

    }

    private function validateEmail()
    {
        $email = $this->test_data($this->data['email']);
        if (empty($email)) {
            $this->addError('email', 'Please enter email');
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Please enter valid email');
            }else{
                $this->addData('email', $email);
            }
        }
    }

    private function validateId()
    {
        $idno = $this->test_data($this->data['idno']);
        $avleave = $this->test_data($this->data['avleave']);
        $position = $this->test_data($this->data['position']);

        if (empty($idno)) {
            $this->addError('idno', 'please enter your id number');
        } else {
            if (!preg_match('/^[0-9]{6,6}$/', $idno)) {
                $this->addError('idno', 'please enter valid id number');
            }else{
                $this->addData('idno', $idno);

            }
        }
        if (empty($avleave)) {
            $this->addError('avleave', 'please enter available leave days');
        } else {
            if (!preg_match('/^[0-9]{1,3}$/', $avleave)) {
                $this->addError('avleave', 'please enter valid number of days');
            }else{
                $this->addData('avleave', $avleave);

            }
        }
        
        if (!empty($position)) {
            $this->addData('position', $position);
        }
    }

    private function validatePhone()
    {
        $phone = $this->test_data($this->data['phone']);
        $contactphone = $this->test_data($this->data['contactphone']);
        if (empty($phone)) {
            $this->addError('phone', 'please enter your phone number');
        } else {
            if (!preg_match('/^[+0-9]{9,13}$/', $phone)) {
                $this->addError('phone', 'please enter valid phone number');
            } else{
                $this->addData('phone', $phone);
            }
        }

        if (empty($contactphone)) {
            $this->addError('contactphone', 'please enter phone number');
        } else {
            if (!preg_match('/^[+0-9]{9,13}$/', $contactphone)) {
                $this->addError('contactphone', 'please enter valid phone number');
            }else{
                $this->addData('contactphone', $contactphone);
            }
        }
    }

    private function validateSelection()
    {

        $gender = $this->test_data($this->data['gender']);
        $empyear = $this->test_data($this->data['empyear']);
        $empstatus = $this->test_data($this->data['empstatus']);
        $department = $this->test_data($this->data['department']);
        if (empty($gender)) {
            $this->addError('gender', 'please select your gender');
        }else{
            $this->addData('gender', $gender);
        }
        if (empty($empyear)) {
            $this->addError('empyear', 'please select Employment year');
        }else{
            $this->addData('empyear', $empyear);
        }
        if (empty($empstatus)) {
            $this->addError('empstatus', 'please select your Employment status');
        }else{
            $this->addData('empstatus', $empstatus);
        }
        if (empty($department)) {
            $this->addError('department', 'please select your department');
        }else{
            $this->addData('department', $department);
        }
    }

    private function validateAddress()
    {
        $region = $this->test_data($this->data['region']);
        $woreda = $this->test_data($this->data['woreda']);
        $zone = $this->test_data($this->data['zone']);
        $locality = $this->test_data($this->data['locality']);
        if (empty($region) || empty($zone) || empty($woreda) || empty($locality)) {
            $this->addError('address', 'please enter full address');
        } else {
            if (!preg_match('/^[A-Za-z0-9 ]{2,30}$/', $region) || !preg_match('/^[A-Za-z0-9 ]{2,30}+$/', $zone) || !preg_match('/^[A-Za-z0-9 ]{2,30}+$/', $woreda) || !preg_match('/^[A-Za-z0-9 ]{2,30}+$/', $locality)) {

                $this->addError('address', 'please enter valid address');
            } else {
                $this->addData('region', $region);
                $this->addData('woreda', $woreda);
                $this->addData('zone', $zone);
                $this->addData('locality', $locality);
            }
        }
    }

    private function validatePassword()
    {

        $password = trim($this->data['password']);
        $cpassword = trim($this->data['cpassword']);
        if (empty($password)) {
            $this->addError('password', 'please enter your password');
        } else if (empty($cpassword)) {
            $this->addError('password', 'please confirm your password');
        } else {
            if ($password != $cpassword) {
                $this->addError('password', 'please enter the same password');
            } else {
                $this->addData('password', password_hash($password, PASSWORD_BCRYPT));
            }
        }
    }


    private function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }

    private function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

}
