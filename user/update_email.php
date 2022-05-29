<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';
include_once '../modules/notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-student.php');

if (isset($_POST["user-email"])) {
    $sql = "SELECT user, email FROM users WHERE user != '" . $_SESSION['user'] . "' and email = '" . $_POST["user-email"] . "' LIMIT 1";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            Error('Este correo electrónico ya está en uso.');
        } else {
            $sql = "UPDATE users SET email = '" . $_POST['user-email'] . "' WHERE user = '" . $_SESSION['user'] . "'";

            if (mysqli_query($conexion, $sql)) {
                Info('Correo actualizado.');
            } else {
                Error('Error al actualizar correo.');
            }
        }
        header('Location: /user');
        exit();
    }
} else {
    header('Location: /');
    exit();
}