<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtgroup'])) {
	header('Location: /');
	exit();
}

$sql = "SELECT * FROM groups WHERE id_group = '" . $_POST['txtgroup'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['msgbox_info'] = 0;
		$_SESSION['msgbox_error'] = 1;
		$_SESSION['text_msgbox_error'] = 'El grupo que intenta crear ya éxiste.';

		header('Location: /modules/groups');
		exit();
	} else {
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
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Debe seleccionar minimo un estudiante.';

			header('Location: /modules/groups');
			exit();
		} else {

			$sql_insert = "INSERT INTO groups(id_group, name, teacher, subjects, students) VALUES('" . trim($_POST['txtgroup']) . "', '" . trim($_POST['txtgroupname']) . "', '" . trim($_POST['selectteacher']) . "', '" . trim($_POST['selectsubject']) . "', '" . trim($_SESSION['students']) . "')";

			if (mysqli_query($conexion, $sql_insert)) {
				$_SESSION['msgbox_error'] = 0;
				$_SESSION['msgbox_info'] = 1;
				$_SESSION['text_msgbox_info'] = 'Registro cargado correctamente.';
			} else {
				$_SESSION['msgbox_info'] = 0;
				$_SESSION['msgbox_error'] = 1;
				$_SESSION['text_msgbox_error'] = 'Error al guardar datos en tabla.';
			}

			header('Location: /modules/groups');
			exit();
		}
	}
}