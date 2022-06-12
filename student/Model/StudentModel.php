<?php
require("Database.php");

class StudentModel extends Database{

    //Showing result of all students
    public function getStudents(){

        $query = "SELECT * FROM task";
        $result = $this->getRecords($query);
        return $result;

    }

    //Updating student
    public function updateStudents($data){

        $id = $_REQUEST['id'];
        $old_data = $this->getStudent($id);
        $updated_data = array_merge($old_data, $_REQUEST);

        $name = $updated_data['name'];
        $password = $updated_data['password'];
        $city = $updated_data['city'];
        $dob = $updated_data['dob'];


        $query = "UPDATE task
                  SET name = '$name', password = '$password', city = '$city', dob = '$dob'
                  WHERE id = '$id'";


        $result = $this->updateRecords($query);
        return $result;
    }


    public function getStudent($student_id){

        $query = "SELECT * FROM task where id = '$student_id'";
        $result = $this->getRecords($query);
        return $result;

    }

    //Creating student
    public function createStudents($data){

        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $city = $_REQUEST['city'];
        $dob = $_REQUEST['dob'];


        $query = "INSERT INTO task (name, password, city, dob)
                  VALUES ('$name', '$password', '$city', '$dob')";

        $result = $this->createRecords($query);
        return $result;
    }

    //Deleting student
    public function deleteStudents($data){

        $id = $_REQUEST['id'];

        $query = "DELETE FROM task WHERE id = '$id'";
        var_dump($query);

        $result = $this->deleteRecords($query);
        return $result;
    }


}


?>