<?php

require_once 'database.php';

class leaveClass extends database
{
    protected $tableleave = "appleave";
    protected $tablename = "register";
    protected $dep = "departments";
    protected $pos = "positions";


    public function applyLeave($data)
    {
        if (!empty($data)) {
            $fields = $placeholder = [];
            foreach ($data as $field => $value) {
                $fields[] = $field;
                $placeholder[] = ":{$field}";
            }
        }

        $sql = "INSERT INTO {$this->tableleave} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholder) . ")";

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

    public function getLeaveHis($field, $value)
    {
        $sql = "SELECT * FROM {$this->tableleave} WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }


    public function getcount()
    {
        $sql = "SELECT count(*) as pcount FROM {$this->tablename}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pcount'];
    }


    //fn to get single row
    public function getrow($field, $value)
    {
        $sql = "SELECT * FROM {$this->tableleave} WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

    public function getdep($field, $value)
    {
        $sql = "SELECT * FROM {$this->dep} WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

    //fn to delete

    public function deleteRow($id)
    {
        $sql = "DELETE FROM {$this->tableleave} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute([':id' => $id]);
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            return false;
        }
    }


    public function deleteDep($id)
    {
        $sql = "DELETE FROM {$this->dep} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute([':id' => $id]);
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            return false;
        }
    }


    public function getrows()
    {
        $sql = "SELECT * FROM {$this->tablename} JOIN {$this->tableleave} ON {$this->tablename}.idno = {$this->tableleave}.idno ORDER BY 1,2";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

    public function employees()
    {
        $sql = "SELECT * FROM {$this->tablename} ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

    // fn to update
    public function update($data, $id)
    {
        if (!empty($data)) {
            $fields = "";
            $x = 1;
            $fieldsCount = count($data);
            foreach ($data as $field => $value) {
                $fields .= "{$field}=:{$field}";
                if ($x < $fieldsCount) {
                    $fields .= ",";
                }
                $x++;
            }
        }
        $sql = "UPDATE {$this->tableleave} SET {$fields} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $data['id'] = $id;
            $stmt->execute($data);
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            $this->conn->rollBack();
        }
    }

    public function departments()
    {
        $sql = "SELECT * FROM {$this->dep} ORDER BY dep_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

    public function add_department($data)
    {
        if (!empty($data)) {
            $fields = $placeholder = [];
            foreach ($data as $field => $value) {
                $fields[] = $field;
                $placeholder[] = ":{$field}";
            }
        }

        $sql = "INSERT INTO {$this->dep} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholder) . ")";

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

    public function updatedepartment($data, $id)
    {
        if (!empty($data)) {
            $fields = "";
            $x = 1;
            $fieldsCount = count($data);
            foreach ($data as $field => $value) {
                $fields .= "{$field}=:{$field}";
                if ($x < $fieldsCount) {
                    $fields .= ",";
                }
                $x++;
            }
        }
        $sql = "UPDATE {$this->dep} SET {$fields} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $data['id'] = $id;
            $stmt->execute($data);
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            $this->conn->rollBack();
        }
    }

    public function positions($dept)
    {
        $sql = "SELECT * FROM {$this->dep} JOIN {$this->pos} WHERE department=:department ORDER BY 1,2";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":department" => $dept]);

        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

    public function add_position($data)
    {
        if (!empty($data)) {
            $fields = $placeholder = [];
            foreach ($data as $field => $value) {
                $fields[] = $field;
                $placeholder[] = ":{$field}";
            }
        }

        $sql = "INSERT INTO {$this->pos} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholder) . ")";

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

    public function getpos($field, $value)
    {
        $sql = "SELECT * FROM {$this->pos} WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

    public function allpos($field, $value)
    {
        $sql = "SELECT * FROM {$this->pos} WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

    public function updateposition($data, $id)
    {
        if (!empty($data)) {
            $fields = "";
            $x = 1;
            $fieldsCount = count($data);
            foreach ($data as $field => $value) {
                $fields .= "{$field}=:{$field}";
                if ($x < $fieldsCount) {
                    $fields .= ",";
                }
                $x++;
            }
        }
        $sql = "UPDATE {$this->pos} SET {$fields} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $data['id'] = $id;
            $stmt->execute($data);
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            $this->conn->rollBack();
        }
    }

    public function deletePos($id)
    {
        $sql = "DELETE FROM {$this->pos} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute([':id' => $id]);
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo "error:" . $e->getMessage();
            return false;
        }
    }
}
