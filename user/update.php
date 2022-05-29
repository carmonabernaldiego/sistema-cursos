<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';
include_once '../modules/notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-student.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID de usuario correcto.');
	header('Location: /user');
	exit();
}

if ($_SESSION['permissions'] == 'admin') {
	$sql = "SELECT * FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";
} else if ($_SESSION['permissions'] == 'student') {
	$sql = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";
}

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$date = date('Y-m-d H:i:s');

		if ($_SESSION['permissions'] == 'admin') {
			$sql_update = "UPDATE administratives SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', curp = '" . trim($_POST['txtcurp']) . "', rfc = '" . trim($_POST['txtrfc']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', gender = '" . trim($_POST['selectgender']) . "', phone = '" . trim($_POST['txtphone']) . "', address = '" . trim($_POST['txtaddress']) . "', level_studies = '" . trim($_POST['selectlevelstudies']) . "', occupation = '" . trim($_POST['txtoccupation']) . "', observations = '" . trim($_POST['txtobservation']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
		} else if ($_SESSION['permissions'] == 'student') {
			$sql_update = "UPDATE students SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', curp = '" . trim($_POST['txtcurp']) . "', rfc = '" . trim($_POST['txtrfc']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', gender = '" . trim($_POST['selectGender']) . "', phone = '" . trim($_POST['txtphone']) . "', address = '" . trim($_POST['txtaddress']) . "', career = '" . trim($_POST['selectCareer']) . "', documentation = '" . trim($_POST['selectDocumentation']) . "', admission_date = '" . trim($_POST['dateadmission']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";
		}

		if (mysqli_query($conexion, $sql_update)) {
			Info('Usuario actualizado.');
		} else {
			Error('Error al actualizar usuario.');
		}

		header('Location: /user');
		exit();
	} else {
		Error('Este ID de usuario no existe.');
		header('Location: /user');
		exit();
	}
}