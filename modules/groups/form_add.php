<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-groups" action="insert.php" method="POST">
            <div class="wrap">
                <div class="first">
                    <label for="txtgroupid" class="label">Grupo</label>
                    <input id="txtgroupid" class="text" type="text" name="txtgroup" value="" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" autofocus required />
                    <label for="txtgroupname" class="label">Nombre</label>
                    <input id="txtgroupname" class="text" type="text" name="txtgroupname" value="" maxlength="100" required />
                </div>
                <div class="last">
                    <label for="selectteacher" class="label">Docente</label>
                    <select id="selectteacher" class="select" name="selectteacher" required>
                        <?php
                        echo '
                                <option value="">Seleccioné</option>
                        ';
                        $sql = "SELECT * FROM teachers ORDER BY name";

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
                        echo '
                                <option value="">Seleccioné</option>
                        ';
                        $sql = "SELECT * FROM subjects ORDER BY name";

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
                <?php
                echo
                '	
						<table class="default" style="margin-bottom: 20px;">
							<tr>
								<th style="cursor: default !important;" class="center" colspan="2">Alumnos</th>
							</tr>
					';
                $i = 0;

                $sql = "SELECT * FROM students ORDER BY name";

                if ($result = $conexion->query($sql)) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                            <tr>
								<td style="width: 40px;"><input id="cbox-student' . $i . '" class="cbox-student" type="checkbox" name="check-student[]" value="' . $row['user'] . '"></td>
								<td><label for="cbox-student' . $i . '">' . $row['name'] . " " . $row['surnames'] . '</label></td>
							</tr>
                            ';
                        $i += 1;
                    }
                }
                echo '
						</table>
					';
                ?>
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