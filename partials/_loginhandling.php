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
                session_start();
            //   echo var_dump(password_verify($pass,$row['user_password']));
                $_SESSION['loggedin']=true;
                $_SESSION['useremail']=$email;
                header("Location: /forum/index.php");
                // exit;
            }
            if(!password_verify($pass,$row['user_password']))
            {
                // echo '<script type="text/javascript">
                // <script>$("#loginModal").modal()</script>
                // </script>';
            }
        }
        else
        {
           
            // echo '<script type="text/javascript">
            // <script>$("#loginModal").modal()</script>
            // </script>';
        }
}

?>
