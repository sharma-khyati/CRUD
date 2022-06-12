<?php
require("../Model/StudentModel.php");

//Once the user click on user side the first hit will come on controller.
class StudentController{

    //Showing result of all students
    public function getStudent(){

        $obj = new StudentModel();
        $res = $obj->getStudents();
        echo json_encode($res);
        return;

    }

    //Updating student
    public function updateStudent(){
        $data = $_POST;
        $obj = new StudentModel();
        $res = $obj->updateStudents($data);
        return;

    }

    //Creating student
    public function createStudent(){
        $data = $_POST;
        $obj = new StudentModel();
        $res = $obj->createStudents($data);
        return;

    }

    //Deleting student
    public function deleteStudent(){
        $data = $_POST;
        $obj = new StudentModel();
        $res = $obj->deleteStudents($data);
        return;

    }

}

if(isset($_POST['requestType'])){
    $requestType = $_POST['requestType'];
}else{
    $requestType = 'getRecords';
}

$student_obj = new StudentController();

switch($requestType){
    case "update":
        $student_obj->updateStudent();
        break;
    case "create":
        $student_obj->createStudent();
        break;
    case "delete":
        $student_obj->deleteStudent();
        break;
    default:
        $student_obj->getStudent();
        break;
}

?>