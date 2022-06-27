<?php 

session_start();
session_reset();
session_destroy();
// echo "Session is destroyed";  
header("Location: /forum/index.php");  
?>