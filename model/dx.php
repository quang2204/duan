<?php
function dx()
{
    if (isset($_SESSION['users'])) {
        // Unset all session variables
        $_SESSION = array();
    
        // Destroy the session
        session_destroy();
    
        // Redirect to the login page or any other page as needed
        // Replace login.php with your login page
        header('Location: index.php');
        exit();
    } else {
        // If the user is not logged in, you can redirect to a login page or any other page
        // Replace login.php with your login page
        exit();
    }
   
}
