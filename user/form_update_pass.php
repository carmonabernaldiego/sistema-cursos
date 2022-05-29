<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-student.php');
?>
<div class="form-data" style="width: 50%; margin: 0 25% 3%">
    <div class="loader-user"></div>
    <div class="body">
        <form name="form-update-pass" action="update_pass.php" method="POST" autocomplete="off" autocapitalize="off" onsubmit="return confirmPass()">
            <div class="wrap">
                <div class="center" style="width: 85%; margin-top: 20px;">
                    <label for="txtoldpassword" class="label">Contraseña antigua</label>
                    <input id="txtoldpassword" class="text" type="password" name="txtoldpassword" value="" maxlength="50" autofocus required />
                    <label for="txtnewpassword" class="label">Nueva contraseña</label>
                    <input id="txtnewpassword" class="text" type="password" name="txtnewpassword" value="" maxlength="50" required />
                    <label for="txtconfirmnewpassword" id="labelHide" class="label">Confirmar nueva contraseña</label>
                    <label for="txtconfirmnewpassword" id="labelError" class="label" style="color: red; font-weight: bold;">Las contraseñas no coinciden.</label>
                    <input id="txtconfirmnewpassword" class="text" type="password" name="txtconfirmnewpassword" value="" maxlength="50" required />
                </div>
            </div>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<?php
include_once '../modules/notif_info.php';
?>
<script src="/js/modules/userUpdatePass.js" type="text/javascript"></script>