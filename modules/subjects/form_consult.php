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
echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
	<div class="body">
		<form name="form-consult-subjects" action="" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Asignatura</label>
					<input style="display: none;" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '"/>
					<input class="text" type="text" name="txtsubject" value="' . $_SESSION['subject'][0] . '" disabled/>
				</div>
				<div class="last">
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtsubjectname" value="' . $_SESSION['subject_name'][0] . '" maxlength="100" required disabled/>
				</div>
				<div class="content-full">
					<label class="label">Descripción</label>
					<textarea disabled class="textarea" name="txtsubjectdescription" data-expandable>' . $_SESSION['subject_description'][0] . '</textarea>
				</div>
				<div class="content-full">
					<label class="label">video</label>
					<textarea disabled class="textarea" name="txtsubjectvideo" data-expandable>' . $_SESSION['subject_videos'][0] . '</textarea>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '
</div>
<script src="/js/controls/dataexpandable.js"></script>
<script src="/js/modules/consultcareer.js"></script>
<script>
	$(document).ready(function() {
		$(".select").select2({
			minimumResultsForSearch: Infinity
		});
	});
</script>
';
