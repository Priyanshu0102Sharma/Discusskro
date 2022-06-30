<?php
$exist="false";
$method=$_SERVER['REQUEST_METHOD'];
// echo $method;
if($method=="POST")
{
        require '_dbconnect.php';
        $username=$_POST['username'];
        $pass=$_POST['password'];
        $sql="select * from users where username='$username'";
        $result=mysqli_query($conn, $sql);
        $numrows=mysqli_num_rows($result);
        if($numrows==1)
        {
            $row=mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_password']));
            {
                session_start();
              $a= password_verify($pass,$row['user_password']);
              if($a==false)
              {
                $exist="false";
             }
              else
              {
                $exist="true";
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                $_SESSION['sno']=$row['sno'];
                header("Location: /forum/index.php?loginsuccess=$exist");
              }
             

            }
            if(!password_verify($pass,$row['user_password']))
            {
                header("Location: /forum/index.php?loginsuccess=$exist");
            }
        }
        else
        {
            header("Location: /forum/index.php?loginsuccess=$exist");
        }
}

?>
