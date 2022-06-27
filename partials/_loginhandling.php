<?php

$method=$_SERVER['REQUEST_METHOD'];
// echo $method;
if($method=="POST")
{
        require '_dbconnect.php';
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $sql="select * from users where user_email='$email'";
        $result=mysqli_query($conn, $sql);
        $numrows=mysqli_num_rows($result);
        if($numrows==1)
        {
            $row=mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_password']));
            {
                // echo "You have logged in";
                session_start();
                // echo "you have logged in";
                $_SESSION['loggedin']=true;
                $_SESSION['useremail']=$email;
                header("Location: /forum/index.php");
                // exit;
            }
            if(!password_verify($pass,$row['user_password']))
            {
                echo "you have typed wrong password";
            }
        }
        else
        {
            echo "Enter Wrong Email id";
        }
}

?>
