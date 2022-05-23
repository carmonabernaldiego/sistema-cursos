<?php
if ($_SESSION['permissions'] == 'admin' || $_SESSION['permissions'] == 'student') {
} else {
    header('Location: /');
    exit();
}