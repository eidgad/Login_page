<?php

    session_start();
    include "login_page.html";
    $dsn="mysql:host:localhost;dbname=users";
    $db_user="root";
    $db_pass="";
    $options=array(pdo::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');

    try {
        //intialize database connection 
        $connection=new PDO($dsn,$db_user,$db_pass,$options);
        //error attribute for catch
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "connected successfully<br>";
    }
    catch (PDOException $e){
        echo 'failed'.$e->getMessage();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"):
        $username=$_POST["username"];
        $password=$_POST["password"];
        $query="SELECT * FROM users.login_data WHERE username=:username AND password=:password";
        $stmt=$connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result=$stmt->fetch(pdo::FETCH_ASSOC);
        if ($result):
            header("location: user_info.php");
            exit();
        else:
            
        endif;
    endif;


?>



