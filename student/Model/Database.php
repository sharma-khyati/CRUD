<?php
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE_NAME", "student");

class Database{

    protected $connection;

    public function __construct(){

        try{
            $this->connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE_NAME);
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    //Creating new student
    public function createRecords($query){
        try{
            if(mysqli_query($this->connection, $query)){
                echo "New Record Added";
            }
            else{
                echo "Error: " . $query . ":-" . mysqli_error($this->connection);
            }
        }
        catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    //Getting all data of students
    public function getRecords($query){

        try {
            $query = mysqli_query($this->connection,$query);
            if(!$query)
            {
                echo "Query does not work.".mysqli_error($this->connection);
                die;
            }

            while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                $results[] = $result;
            }
            return $results;

        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    //Updating student by id
    public function updateRecords($query){
        try{
            if(mysqli_query($this->connection, $query)){
                echo "Record Updated";
            }
            else{
                echo "Error: " . $query . ":-" . mysqli_error($this->connection);
            }
        }
        catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    //Delete student by id
    public function deleteRecords($query){
        try{
            if(mysqli_query($this->connection, $query)){
                echo "Record Deleted". $query;
            }
            else{
                echo "Error: " . $query . ":-" . mysqli_error($this->connection);
            }
        }
        catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }
}

?>