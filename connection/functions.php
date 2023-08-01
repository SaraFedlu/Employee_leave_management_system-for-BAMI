<?php

require_once 'database.php';

class functions extends database
{
    protected $tablename = "register";
   
    //function to add users
    public function add($data)
    {
        if (!empty($data)) {
            $fields = $placeholder = [];
            foreach ($data as $field => $value) {
                $fields[] = $field;
                $placeholder[] = ":{$field}";
            }
        }
   

        $sql = "INSERT INTO {$this->tablename} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholder) . ")";

        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $lastinsertedid = $this->conn->lastInsertId();
            $this->conn->commit();
            return $lastinsertedid;
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            $this->conn->rollBack();
        }
    }
 
   
    public function check($field, $value)
    {

        $stmt = $this->conn->prepare("SELECT * FROM {$this->tablename} WHERE {$field}= :{$field}");
        $stmt->execute([":{$field}" => $value]);
        if ($stmt->rowCount() > 0) {
           
           
          return $stmt->rowCount();
        }
    }

    public function infoCheck($idnum)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->tablename} WHERE idno = '$idnum'");
        $stmt->execute(); 
        if ($stmt->rowCount() == 1) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           
            return $result['password'];
          }
    }


    public function passRecover($id)
    {
        $stmt = $this->conn->prepare("SELECT email, phone FROM {$this->tablename} WHERE idno = '$id'");
        $stmt->execute(); 
        if ($stmt->rowCount() == 1) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
          }
    }

    //function to get rows

    public function getrows($field, $value)
    {
        $sql = "SELECT * FROM {$this->tablename} WHERE {$field}=:{$field} ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);

        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

    //fn to get single row
    public function getrow($field, $value)
    {
        $sql = "SELECT * FROM {$this->tablename} WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }


    //fn to count no of rows
    public function getcount()
    {
        $sql = "SELECT count(*) as pcount FROM {$this->tablename}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pcount'];
    }

    // fn to upload photo
    public function uploadphoto($file)
    {
        if (!empty($file)) {
            $filetemppath = $file['tmp_name'];
            $filename = $file['name'];
            $filetype = $file['type'];
            $filenamecmps = explode('.', $filename);
            $file_extension = strtolower(end($filenamecmps));
            $newfilename = md5(time() . $filename) . '.' . $file_extension;
           /* $allowedextn = ["png", "jpg", "jpeg"];

            if (in_array($file_extension, $allowedextn)) {*/
                $uploadfiledir = 'C:/xampp/htdocs/myproject/uploads/';
                $destfilepath = $uploadfiledir . $newfilename;
                if (move_uploaded_file($filetemppath, $destfilepath)) {
                    return $newfilename;
                }

        }
    }
    //fn to update password
    public function updatepwd($data, $id){
        if(!empty($data)){
            $sql="UPDATE {$this->tablename} SET password = '$data' WHERE idno='$id'";
            $stmt = $this->conn->prepare($sql);
            try {
                $this->conn->beginTransaction();
                $stmt->execute();
                $this->conn->commit();
                return true;
            } catch (PDOException $e) {
                echo "error:" . $e->getMessage();
                $this->conn->rollBack();
            }
        }
    }

    public function updateAvLv($data, $id){
        if(!empty($data)){
            $sql="UPDATE {$this->tablename} SET avleave = '$data' WHERE idno='$id'";
            $stmt = $this->conn->prepare($sql);
            try {
                $this->conn->beginTransaction();
                $stmt->execute();
                $this->conn->commit();
                return true;
            } catch (PDOException $e) {
                echo "error:" . $e->getMessage();
                $this->conn->rollBack();
            }
        }
    }

   
  // fn to update
  public function update($data,$id) {
    if(!empty($data)) {
        $fields="";
        $x=1;
        $fieldsCount=count($data);
        foreach($data as $field=>$value) {
            $fields.="{$field}=:{$field}";
            if($x<$fieldsCount) {
                $fields.=",";
            }
            $x++;
        }
    }
    $sql="UPDATE {$this->tablename} SET {$fields} WHERE idno=:idno";
    $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $data['idno']=$id;
            $stmt->execute($data);
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            $this->conn->rollBack();
        }
  }
  //fn to delete

    public function deleteRow($id){
        $sql="DELETE FROM {$this->tablename} WHERE idno=:idno";
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute([':idno'=>$id]);
            if($stmt->rowCount()>0){
                return true;
            }
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            return false;
        }
    }
  // fn to search
    public function searchuser($searchText,$start=0,$limit=4){
        $sql="SELECT * FROM {$this->tablename} WHERE name LIKE :search ORDER BY name ASC LIMIT {$start},{$limit}";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([':search'=>"{$searchText}%"]);
        if($stmt->rowCount()>0) {
            $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $results=[];
        }
        return $results;
    }



}