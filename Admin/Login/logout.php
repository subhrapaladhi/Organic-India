<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ./login.php");
} else if (isset($_SESSION['admin']) != "") {
    header("Location: ./login.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin']);
    header("Location: ./login.php");
    exit;
}
