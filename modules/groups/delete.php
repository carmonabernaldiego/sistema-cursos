<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtgroup'])) {
	header('Location: /');
	exit();
}

$sql_delete = "DELETE FROM groups WHERE id_group = '" . $_POST['txtgroup'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	Error('Grupo eliminado.');
} else {
	Error('Error al eliminar.');
}
header('Location: /modules/groups');
exit();