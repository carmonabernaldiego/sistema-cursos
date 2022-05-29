<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-student.php');

if ($_SESSION['permissions'] == 'admin') {
    $sql = "SELECT * FROM administratives WHERE user = '" . $_SESSION['user'] . "'";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['user'];
            $_SESSION['administrative_name'] = $row['name'];
            $_SESSION['administrative_surnames'] = $row['surnames'];
            $_SESSION['administrative_date_of_birth'] = $row['date_of_birth'];
            $_SESSION['administrative_gender'] = $row['gender'];
            $_SESSION['administrative_curp'] = $row['curp'];
            $_SESSION['administrative_rfc'] = $row['rfc'];
            $_SESSION['administrative_phone'] = $row['phone'];
            $_SESSION['administrative_address'] = $row['address'];
            $_SESSION['administrative_level_studies'] = $row['level_studies'];
            $_SESSION['administrative_occupation'] = $row['occupation'];
            $_SESSION['administrative_observations'] = $row['observations'];
        }
    }
} else if ($_SESSION['permissions'] == 'student') {
    $sql = "SELECT * FROM students WHERE user = '" . $_SESSION['user'] . "'";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['user'];
            $_SESSION['student_name'] = $row['name'];
            $_SESSION['student_surnames'] = $row['surnames'];
            $_SESSION['student_gender'] = $row['gender'];
            $_SESSION['student_date_of_birth'] = $row['date_of_birth'];
            $_SESSION['student_curp'] = $row['curp'];
            $_SESSION['student_rfc'] = $row['rfc'];
            $_SESSION['student_phone'] = $row['phone'];
            $_SESSION['student_address'] = $row['address'];
            $_SESSION['student_career'] = $row['career'];
            $_SESSION['student_documentation'] = $row['documentation'];
            $_SESSION['student_admission_date'] = $row['admission_date'];
        }
    }
}
?>
<div class="form-data" style="width: 100%;">
    <div class="loader-user"></div>
    <div class="body">
        <form name="form-update-user" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
            <div class="wrap">
                <?php
                if ($_SESSION['permissions'] == 'admin') {
                    echo '
                    <div class="first">
                        <label for="txtuserid" class="label">Usuario</label>
                        <input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="' . $_SESSION['user_id'] . '" maxlength="50">
                        <input class="text" type="text" name="txt" value="' . $_SESSION['user_id'] . '" maxlength="50" disabled />
                        <label for="txtusername" class="label">Nombre</label>
                        <input id="txtusername" class="text" type="text" name="txtname" value="' . $_SESSION['administrative_name'] . '" placeholder="Nombre" autofocus maxlength="30" required />
                        <label for="txtusersurnames" class="label">Apellidos</label>
                        <input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="' . $_SESSION['administrative_surnames'] . '" placeholder="Apellidos" maxlength="60" required />
                        <label for="dateofbirth" class="label">Fecha de nacimiento</label>
                        <input id="dateofbirth" class="date" type="text" name="dateofbirth" value="' . $_SESSION['administrative_date_of_birth'] . '" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
                        <label for="selectgender" class="label">Género</label>
                        <select id="selectgender" class="select" name="selectgender" required>
                    ';
                    if ($_SESSION['administrative_gender'] == '') {
                        echo '
								<option value="">Seleccioné</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['administrative_gender'] == 'mujer') {
                        echo '
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['administrative_gender'] == 'hombre') {
                        echo '
								<option value="hombre">Hombre</option>
								<option value="mujer">Mujer</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['administrative_gender'] == 'otro') {
                        echo '
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['administrative_gender'] == 'nodecirlo') {
                        echo '
								<option value="nodecirlo">Prefiero no decirlo</option>
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
							';
                    }
                    echo '
                        </select>
                        <label for="txtusercurp" class="label">CURP</label>
                        <input id="txtusercurp" class="text" type="text" name="txtcurp" value="' . $_SESSION['administrative_curp'] . '" placeholder="Clave Única de Registro de Población" pattern="[A-Za-z0-9]{18}" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
                    </div>
                    <div class="last">
                        <label for="txtuserrfc" class="label">RFC</label>
                        <input id="txtuserrfc" class="text" type="text" name="txtrfc" value="' . $_SESSION['administrative_rfc'] . '" placeholder="XAXX010101000" pattern="[A-Za-z0-9]{13}" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
                        <label for="txtuserphone" class="label">Número de teléfono</label>
                        <input id="txtuserphone" class="text" type="text" name="txtphone" value="' . $_SESSION['administrative_phone'] . '" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="9998887766" maxlength="10" required />
                        <label for="txtuseraddress" class="label">Domicilio</label>
                        <input id="txtuseraddress" class="text" type="text" name="txtaddress" value="' . $_SESSION['administrative_address'] . '" placeholder="Domicilio" maxlength="200" required />
                        <label for="selectuserlevelstudies" class="label">Nivel de estudios</label>
                        <select id="selectuserlevelstudies" class="select" name="selectlevelstudies" required>
                    ';
                    if ($_SESSION['administrative_level_studies'] == 'Licenciatura') {
                        echo
                        '
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
                    } elseif ($_SESSION['administrative_level_studies'] == 'Ingenieria') {
                        echo
                        '
								<option value="Ingenieria">Ingenieria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Maestria">Maestria</option>
								<option value="Doctorado">Doctorado</option>
							';
                    } elseif ($_SESSION['administrative_level_studies'] == 'Maestria') {
                        echo
                        '
								<option value="Maestria">Maestria</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Doctorado">Doctorado</option>
							';
                    } elseif ($_SESSION['administrative_level_studies'] == 'Doctorado') {
                        echo
                        '
								<option value="Doctorado">Doctorado</option>
								<option value="Licenciatura">Licenciatura</option>
								<option value="Ingenieria">Ingenieria</option>
								<option value="Maestria">Maestria</option>
							';
                    }
                    echo '
                        </select>
                        <label for="txtuseroccupation" class="label">Cargo</label>
                        <input id="txtuseroccupation" class="text" type="text" name="txtoccupation" value="' . $_SESSION['administrative_occupation'] . '" placeholder="Cargo" maxlength="100" required />
                        <label for="txtuserobservation" class="label">Observación</label>
                        <input id="txtuserobservation" class="text" type="text" name="txtobservation" value="' . $_SESSION['administrative_observations'] . '" placeholder="Observación" maxlength="200" />
                    </div>
                    ';
                } else if ($_SESSION['permissions'] == 'student') {
                    echo '
                    <div class="first">
                        <label for="txtuserid" class="label">Usuario</label>
                        <input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="' . $_SESSION['user_id'] . '" maxlength="50">
                        <input class="text" type="text" name="txt" value="' . $_SESSION['user_id'] . '" maxlength="50" disabled />
                        <label for="txtusername" class="label">Nombre</label>
                        <input id="txtusername" class="text" type="text" name="txtname" value="' . $_SESSION['student_name'] . '" placeholder="Nombre" autofocus maxlength="30" required />
                        <label for="txtusersurnames" class="label">Apellidos</label>
                        <input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="' . $_SESSION['student_surnames'] . '" placeholder="Apellidos" maxlength="60" required />
                        <label for="dateofbirth" class="label">Fecha de nacimiento</label>
                        <input id="dateofbirth" class="date" type="text" name="dateofbirth" value="' . $_SESSION['student_date_of_birth'] . '" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
                        <label for="selectgender" class="label">Género</label>
                        <select id="selectgender" class="select" name="selectGender" required>
                    ';
                    if ($_SESSION['student_gender'] == '') {
                        echo '
								<option value="">Seleccioné</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['student_gender'] == 'mujer') {
                        echo '
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['student_gender'] == 'hombre') {
                        echo '
								<option value="hombre">Hombre</option>
								<option value="mujer">Mujer</option>
								<option value="otro">Otro</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['student_gender'] == 'otro') {
                        echo '
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
								<option value="nodecirlo">Prefiero no decirlo</option>
							';
                    } elseif ($_SESSION['student_gender'] == 'nodecirlo') {
                        echo '
								<option value="nodecirlo">Prefiero no decirlo</option>
								<option value="otro">Otro</option>
								<option value="mujer">Mujer</option>
								<option value="hombre">Hombre</option>
							';
                    }
                    echo '
                        </select>
                        <label for="selectuserdocumentation" class="label">Documentación</label>
                        <select id="selectuserdocumentation" class="select" name="selectDocumentation" required>
                    ';
                    if ($_SESSION['student_documentation'] == '') {
                        echo '
								<option value="">Seleccioné</option>
								<option value="1">Sí</option>
								<option value="0">No</option>
							';
                    } else if ($_SESSION['student_documentation'][0] == 1) {
                        echo
                        '
								<option value="1">Sí</option>
								<option value="0">No</option>
							';
                    } elseif ($_SESSION['student_documentation'][0] == 0) {
                        echo
                        '
								<option value="0">No</option>
								<option value="1">Sí</option>
							';
                    }
                    echo '
					    </select>
				</div>
				<div class="last">
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="' . $_SESSION['student_curp'] . '" placeholder="Clave Única de Registro de Población" pattern="[A-Za-z0-9]{18}" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="' . $_SESSION['student_rfc'] . '" placeholder="XAXX010101000" pattern="[A-Za-z0-9]{13}" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="' . $_SESSION['student_phone'] . '" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="9998887766" maxlength="10" required />
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="' . $_SESSION['student_address'] . '" placeholder="Domicilio" maxlength="200" required />
					<label for="selectusercareers" class="label">Carrera</label>
					<input id="selectusercareers" class="text" type="text" name="selectCareer" value="' . $_SESSION['student_career'] . '" placeholder="Carrera" maxlength="200" required />
					<label for="dateuseradmission" class="label">Fecha de admisión</label>
					<input id="dateuseradmission" class="date" type="text" name="dateadmission" value="' . $_SESSION['student_admission_date'] . '" required />
				</div>
                ';
                }
                ?>
            </div>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<?php
include_once '../modules/notif_info.php';
?>
<script src="/js/modules/userUpdate.js" type="text/javascript"></script>