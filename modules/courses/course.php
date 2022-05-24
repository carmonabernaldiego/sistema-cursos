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
    <link rel="stylesheet" href="/css/style.css?v=<?php echo (rand()); ?>" media="screen, projection" type="text/css" />
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
        <div class="info-title">
            <span class="title">
                <?php
                echo $_SESSION['subject_name_groups'][0] . '<br>';
                ?>
            </span>
        </div>
    </header>
    <aside>
        <?php
        if (!empty($_SESSION['section-student']) == 'go-' . $_SESSION['user']) {
            include_once '../sections/section-student.php';
        }
        ?>
    </aside>
    <section class="content-info">
        <?php
        $sql = "SELECT * FROM groups WHERE id_group = '" . $_GET['id'] . "'";

        if ($result = $conexion->query($sql)) {
            if ($row = mysqli_fetch_array($result)) {
                $_SESSION['groups'][0] = $row['id_group'];
                $_SESSION['name_groups'][0] = $row['name'];
                $teacher_groups = $row['teacher'];

                $sql = "SELECT * FROM subjects WHERE subject = '" . $row['subjects'] . "'";

                if ($result = $conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($result)) {
                        $_SESSION['subject_name_groups'][0] = $row['name'];
                        $_SESSION['subject_description_groups'][0] = $row['description'];
                        $_SESSION['subject_video_groups'][0] = $row['video'];
                    }
                }

                $sql = "SELECT * FROM teachers WHERE user = '" . $teacher_groups . "'";

                if ($result = $conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($result)) {
                        $_SESSION['teacher_name_groups'][0] = $row['name'] . ' ' . $row['surnames'];
                    }
                }
            }
        }
        ?>
        <div class="info-course">
            <div class="details-course">
                <div class="box">
                    <span><?php echo 'ID: '.$_SESSION['groups'][0]; ?></span>
                    <span><?php echo 'Nombre: ' . $_SESSION['name_groups'][0]; ?></span>
                    <span><?php echo 'Docente: ' . $_SESSION['teacher_name_groups'][0]; ?></span>
                </div>
                <p><?php echo $_SESSION['subject_description_groups'][0]; ?></p>
            </div>
            <div class="video-course">
                <iframe width="100%" height="100%" src="<?php echo $_SESSION['subject_video_groups'][0] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>
</body>
<script src="/js/controls/buttons.js" type="text/javascript"></script>

</html>