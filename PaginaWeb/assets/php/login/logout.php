<?php
session_start();
unset ($SESSION['username']);
session_destroy();
header("Status: 301 Moved Permanently");
header("Location: login.html");
?>