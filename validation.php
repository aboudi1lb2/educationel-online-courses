<?php
if( (isset($_COOKIE['auth']) && $_COOKIE['auth'] === 'true') && isset($_COOKIE['email']));
else header('location:signin.php');

?>