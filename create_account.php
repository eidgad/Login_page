<?php
    session_start();
    include "create_acc_form.html";
    
    if($_SERVER["REQUEST_METHOD"]=="POST"):
        $id=$_POST["id"];
        $username=$_POST["username"];
        $username=(string)($username);
        $password=$_POST["password"];
        $ph_no=$_POST["ph_no"];
        $birthdate=date_format(date_create($_POST["birthdate"]),"Ymd");
/*****************************************************/
    $dsn="mysql:host:localhost;dbname=users";
    $db_user="root";
    $db_pass="";
    $options=array(pdo::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');

    try{
        $con=new PDO($dsn,$db_user,$db_pass,$options);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query="INSERT INTO users.login_data (id,username,password,ph_no,birthdate) values ($id,'$username','$password',$ph_no,$birthdate);";
        $stmt=$con->prepare($query);
        $stmt->execute();
    }    
    catch (PDOException $e){
        echo 'failed '.$e->getMessage();
    }
    endif;

?>