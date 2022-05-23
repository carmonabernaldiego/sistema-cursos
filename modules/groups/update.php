<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_POST['txtgroup'] = trim($_POST['txtgroup']);

if (empty($_POST['txtgroup'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtgroup'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: /modules/groups');
	exit();
}

$sql = "SELECT * FROM groups WHERE id_group = '" . $_POST['txtgroup'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		//Recuperamos los alumnos seleccionados
		$_SESSION['students_count'] = 0;
		$_SESSION['students'] = "";

		if (!empty($_POST['check-student'])) {
			foreach ($_POST['check-student'] as $selected) {
				$_SESSION['students'] .= $selected . ",";
				$_SESSION['students_count'] += 1;
			}
			$_SESSION['students'] = rtrim($_SESSION['students'], ",");
		}

		if ($_SESSION['students_count'] == 0) {
			Error('Debe seleccionar minimo un estudiante.');
			header('Location: /modules/groups');
			exit();
		} else {

			$sql_update = "UPDATE groups SET name = '" . trim($_POST['txtgroupname']) . "', teacher = '" . trim($_POST['selectteacher']) . "', subjects = '" . trim($_POST['selectsubject']) . "', students = '" . trim($_SESSION['students']) . "' WHERE id_group = '" . trim($_POST['txtgroup']) . "'";

			if (mysqli_query($conexion, $sql_update)) {
				Info('Registro cargado correctamente.');
				header('Location: /modules/groups');
				exit();
			} else {
				Error('Error al guardar datos en tabla.');
				header('Location: /modules/groups');
				exit();
			}
		}
	} else {
		Error('Este ID de grupo no existe.');
		header('Location: /modules/groups');
		exit();
	}
}