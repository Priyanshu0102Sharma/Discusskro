<?php

$method=$_SERVER['REQUEST_METHOD'];
if($method=="POST")
{
    //connection to the database made
    require "_dbconnect.php";
    $error="1";
    // insert users infromation into database
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $exist="true";
    $existquerry="SELECT * FROM users where user_email='$email'";
    $result=mysqli_query($conn,$existquerry);
    $numrows=mysqli_num_rows($result);
    if($numrows>0)
    {echo"ye aa rha hai";
        $exist="false";
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <strong>SORRY</strong> This username is already taken!! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              $error="0";
              header("Location: /forum/index.php?signupsuccess=$exist");
            }
    else
    { 
        $exist="true";
    }
    if(($password==$cpassword)&& $exist=="true")
    {
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUES ('$email', '$hash', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        echo var_dump($result);
        if($result)
        {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
              <strong>SUCCESS</strong> you have signed up!! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
             header("Location: /forum/index.php?signupsuccess=$exist");

        }
        else
        {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <strong>SORRY</strong> password not match!! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              $error="2";
              header("Location: /forum/index.php?signupsuccess=$exist");
        }

}
}

?>