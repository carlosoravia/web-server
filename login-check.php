<?php

require_once('./main_functions/connection.php');

$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql_select = "SELECT * FROM users WHERE mail = '$email'";

    if($result = $connection->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array();
            if($password == $row[2]){
                session_start();
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['logged'] = true;
                header("Location: area-privata.php");
            }else{
                echo "wrong password";
                header("Location: login.php");
            }
        }else{
            echo "wrong mail";
        }
    }else{
        echo "error in login phase";
    }
}

?>