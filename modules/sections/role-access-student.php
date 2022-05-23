<?php
if ($_SESSION['permissions'] != 'student') {
    header('Location: /');
    exit();
}