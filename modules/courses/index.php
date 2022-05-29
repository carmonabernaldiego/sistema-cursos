<?php
include_once '../security.php';
include_once '../conexion.php';

header('Content-Type: text/html; charset=UTF-8');
header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

//Permisos de Estudiante
require_once($_SESSION['raiz'] . '/modules/sections/role-access-student.php');

$groups = array();
$students_groups = array();

$i = 0;

$sql = "SELECT * FROM groups";

if ($result = $conexion->query($sql)) {
	while ($row = mysqli_fetch_array($result)) {
		$groups[$i] = $row['id_group'];
		$students_groups[$i] = $row['students'];

		$i += 1;
	}
}

$i = 0;
$j = 0;

foreach ($students_groups as $selected) {
	$buscar = strpos($selected, $_SESSION['user']);

	if ($buscar !== false) {
		$sql = "SELECT * FROM groups WHERE id_group = '" . $groups[$i] . "'";

		if ($result = $conexion->query($sql)) {
			if ($row = mysqli_fetch_array($result)) {
				$_SESSION['groups'][$j] = $row['id_group'];
				$_SESSION['name_groups'][$j] = $row['name'];
				$teacher_groups = $row['teacher'];

				$sql = "SELECT * FROM subjects WHERE subject = '" . $row['subjects'] . "'";

				if ($result = $conexion->query($sql)) {
					if ($row = mysqli_fetch_array($result)) {
						$_SESSION['subject_name_groups'][$j] = $row['name'];
					}
				}

				$sql = "SELECT * FROM teachers WHERE user = '" . $teacher_groups . "'";

				if ($result = $conexion->query($sql)) {
					if ($row = mysqli_fetch_array($result)) {
						$_SESSION['teacher_name_groups'][$j] = $row['name'] . ' ' . $row['surnames'];
					}
				}

				$j += 1;
			}
		}
	}

	$i += 1;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<meta name="robots" content="noindex">
	<meta name="google" value="notranslate">
	<link rel="icon" type="image/png" href="/images/icon.png" />
	<title>Cursos | Sistema Escolar</title>
	<meta name="description" content="Sistema Escolar." />
	<link rel="stylesheet" href="/css/style.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/select2.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="/css/litepicker.css" media="screen, projection" type="text/css" />
	<script src="/js/external/jquery.min.js" type="text/javascript"></script>
	<script src="/js/external/litepicker.js" type="text/javascript"></script>
	<script src="/js/external/prefixfree.min.js" type="text/javascript"></script>
	<script src="/js/controls/unsetnotif.js" type="text/javascript"></script>
	<script src="/js/external/select2.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$(".loader").fadeOut("slow");
		});
	</script>
</head>

<body>
	<div class="loader"></div>
	<header class="header">
		<?php
		include_once "../sections/section-info-title.php";
		?>
	</header>
	<aside>
		<?php
		if (!empty($_SESSION['section-student']) == 'go-' . $_SESSION['user']) {
			include_once '../sections/section-student.php';
		}
		?>
	</aside>
	<?php
	if (isset($_SESSION['groups'])) {
		echo '
			<section class="content">
				<div class="courses">
			';

		$i = 0;

		foreach ($_SESSION['groups'] as $selected) {
			echo '
						<div class="course">
							<a href="course?id=' . $selected . '">
								<h3>' . $_SESSION['subject_name_groups'][$i] . '</h3>
								<h4>Grupo: ' . $_SESSION['name_groups'][$i] . '</h4>
								<span>Docente: ' . $_SESSION['teacher_name_groups'][$i] . '</span>
							</a>
						</div>
				';
			$i += 1;
		}
	} else {
		echo '
		<div class="content-404">
			<img src="/images/404.svg" class="data-not-found" alt="404">
		</div>';
	}
	?>
	</div>
	</section>
</body>
<script src="/js/controls/buttons.js" type="text/javascript"></script>

</html>