<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$sql = "SELECT * FROM groups WHERE id_group = '" . $_POST['txtgroup'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['id_group'] = $row['id_group'];
        $_SESSION['name_group'] = $row['name'];
        $_SESSION['teacher_group'] = $row['teacher'];
        $_SESSION['subject_group'] = $row['subjects'];
        $_SESSION['students_group'] = $row['students'];
    }
}
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-update-groups" action="update.php" method="POST">
            <div class="wrap">
                <div class="first">
                    <label for="txtgroupid" class="label">Grupo</label>
                    <input id="txtgroupid" style="display: none;" type="text" name="txtgroup" value="<?php echo $_SESSION['id_group']; ?>" maxlength="50">
                    <input class="text" type="text" name="txt" value="<?php echo $_SESSION['id_group']; ?>" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" disabled />
                    <label for="txtgroupname" class="label">Nombre</label>
                    <input id="txtgroupname" class="text" type="text" name="txtgroupname" value="<?php echo $_SESSION['name_group']; ?>" maxlength="100" autofocus required />
                </div>
                <div class="last">
                    <label for="selectteacher" class="label">Docente</label>
                    <select id="selectteacher" class="select" name="selectteacher" required>
                        <?php
                        $sql = "SELECT * FROM teachers WHERE user = '" . $_SESSION['teacher_group'] . "' ORDER BY name";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '
                                    <option value="' . $row['user'] . '">' . $row['name'] . " " . $row['surnames'] . '</option>
                                ';
                            }
                        }

                        $sql = "SELECT * FROM teachers WHERE user != '" . $_SESSION['teacher_group'] . "' ORDER BY name";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '
                                    <option value="' . $row['user'] . '">' . $row['name'] . " " . $row['surnames'] . '</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                    <label for="selectsubject" class="label">Curso</label>
                    <select id="selectsubject" class="select" name="selectsubject" required>
                        <?php
                        $sql = "SELECT * FROM subjects WHERE subject = '" . $_SESSION['subject_group'] . "' ORDER BY name";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '
                                    <option value="' . $row['subject'] . '">' . $row['name'] . '</option>
                                ';
                            }
                        }

                        $sql = "SELECT * FROM subjects WHERE subject != '" . $_SESSION['subject_group'] . "' ORDER BY name";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '
                                    <option value="' . $row['subject'] . '">' . $row['name'] . '</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="wrap">
                <table class="default" style="margin-bottom: 20px; cursor: default!important;">
                    <tr>
                        <th style="cursor: default !important;" class="center" colspan="2">Alumnos</th>
                    </tr>
                    <?php
                    $i = 0;

                    $arrayStudents = explode(",", $_SESSION['students_group']);

                    $sql = "SELECT * FROM students";

                    if ($result = $conexion->query($sql)) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                                    <tr>
                                        <td style="width: 40px;"><input id="cbox-student' . $i . '" class="cbox-student" type="checkbox" name="check-student[]" value="' . $row['user'] . '"';
                            foreach ($arrayStudents as $selected) {
                                if ($selected == $row['user']) {
                                    echo "checked";
                                }
                            }
                            echo '
                                        ></td>
                                        <td><label for="cbox-student' . $i . '">' . $row['name'] . " " . $row['surnames'] . '</label></td>
                                    </tr>
                                ';
                            $i++;
                        }
                    }
                    ?>
                </table>
            </div>
            <button class="btn icon" name="btnsave" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="../../js/modules/group.js"></script>