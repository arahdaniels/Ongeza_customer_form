<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'ongeza_test');

class DB_con{
function __construct()
{
    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    $this->dbh=$con;
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

// Crud starts here
//create will be implemented by the db set files
public function read_info() {
    //Read from a view
    $read_data =mysqli_query($this->dbh,"SELECT * FROM customer_gender_view'");
    return $read_data;
}
public function update_info() {
    //Read from a view
    $update_data =mysqli_query($this->dbh,"UPDATE customer SET is_deleted = 1 WHERE is_deleted = 0'");
    return $update_data;
}
public function delete_info() {
    //Read from a view
    $update_data =mysqli_query($this->dbh,"DELETE FROM customer WHERE is_deleted = 1'");
    return $update_data;
}
//crud ends


public function registration($first_name,$last_name,$town_name,$gender_id)
{
    $ret=mysqli_query($this->dbh,"insert into customer(first_name,last_name,town_name,gender_id) values('$first_name','$last_name','$town_name','$gender_id')");
    return $ret;
}

public function gender()
{
    $result=mysqli_query($this->dbh,"select id,gender_name from gender'");
    return $result;
}

}
?>