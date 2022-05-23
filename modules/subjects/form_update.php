<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_SESSION['subject'] = array();
$_SESSION['subject_name'] = array();
$_SESSION['subject_description'] = array();
$_SESSION['subject_videos'] = array();

$sql = "SELECT * FROM subjects WHERE subject = '" . $_POST['txtsubject'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['subject'][0] = $row['subject'];
		$_SESSION['subject_name'][0] = $row['name'];
		$_SESSION['subject_description'][0] = $row['description'];
		$_SESSION['subject_videos'][0] =  $row['video'];
	}
}

if (!isset($_SESSION['temp_subject_name'])) {
	$_SESSION['temp_subject_name'] = $_SESSION['subject_name'][0];
}
if (!isset($_SESSION['temp_subject_description'])) {
	$_SESSION['temp_subject_description'] = $_SESSION['subject_description'][0];
}
if (!isset($_SESSION['temp_subject_videos'])) {
	$_SESSION['temp_subject_videos'] = $_SESSION['subject_videos'][0];
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
	<div class="body">
		<form name="form-update-subjects" action="update.php" method="POST" onsubmit="return sendTeachers()">
			<div class="wrap">
				<div class="first">
					<label for="txtsubjectid" class="label">Asignatura</label>
					<input style="display: none;" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '"/>
					<input id="txtsubjectid" class="text" type="text" id="txtsubject" name="txtsubject" value="' . $_SESSION['subject'][0] . '" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" disabled/>
				</div>
				<div class="last">
					<label for="txtsubjectname" class="label">Nombre</label>
					<input id="txtsubjectname" class="text" type="text" id="txtsubjectname" name="txtsubjectname" value="';
if (isset($_SESSION['temp_subject_name'])) {
	echo $_SESSION['temp_subject_name'];
}
echo '" maxlength="100" required autofocus/>
				</div>
				<div class="content-full">
					<label for="txtsubjectdescription" class="label">Descripción</label>
					<textarea id="txtsubjectdescription" maxlength="2000" class="textarea" id="txtsubjectdescription" name="txtsubjectdescription" data-expandable>';
if (isset($_SESSION['temp_subject_description'])) {
	echo $_SESSION['temp_subject_description'];
}
echo '</textarea>
				</div>
				<div class="content-full">
					<label for="txtsubjectvideo" class="label">Videos del Curso</label>
					<textarea id="txtsubjectvideo" maxlength="2000" class="textarea" id="txtsubjectvideo" name="txtsubjectvideo" data-expandable>';
if (isset($_SESSION['temp_subject_videos'])) {
	echo $_SESSION['temp_subject_videos'];
}
echo '</textarea>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '
</div>
<script src="/js/controls/dataexpandable.js"></script>
<script src="/js/modules/updatesubject.js"></script>
';
