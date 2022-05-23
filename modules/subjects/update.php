<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtsubject'])) {
	header('Location: /');
	exit();
}

$_POST['txtsubjectdescription'] = trim(mysqli_real_escape_string($conexion, $_POST['txtsubjectdescription']));

$sql_update = "UPDATE subjects SET name = '" . $_POST['txtsubjectname'] . "', description = '" . $_POST['txtsubjectdescription'] . "', video = '" . $_POST['txtsubjectvideo'] . "' WHERE subject = '" . $_POST['txtsubject'] . "'";

if (mysqli_query($conexion, $sql_update)) {
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Asignatura actualizada.';
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al actualizar.';
}

header('Location: /modules/subjects');