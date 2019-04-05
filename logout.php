<?php
session_start();
session_destroy();
    
    $message = "You have been logged out";  
    echo '<script type="text/javascript">
    alert("'. $message .'");
    location="./login.html";
    </script>';
        
exit;
?>