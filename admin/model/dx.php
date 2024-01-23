<?php
function dx()
{
unset($_SESSION['users']);
header('Location: index.php'); // replace success.php with your success page
   
}