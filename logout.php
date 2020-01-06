<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
 // Redirecting To Home Page
header('Location:index.php');
}
?>
