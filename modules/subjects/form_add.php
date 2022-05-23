<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-subjects" action="insert.php" method="POST" onsubmit="return sendTeachers()">
            <div class="wrap">
                <div class="first">
                    <label for="txtsubjectid" class="label">Asignatura</label>
                    <input id="txtsubjectid" class="text" type="text" id="txtsubject" name="txtsubject" value="" maxlength="20" onkeyup="this.value = this.value.toUpperCase()" autofocus required />
                </div>
                <div class="last">
                    <label for="txtsubjectname" class="label">Nombre</label>
                    <input id="txtsubjectname" class="text" type="text" id="txtsubjectname" name="txtsubjectname" value="" maxlength="100" required />
                </div>
                <div class="content-full">
                    <label for="txtsubjectdescription" class="label">Descripción</label>
                    <textarea id="txtsubjectdescription" maxlength="2000" class="textarea" id="txtsubjectdescription" name="txtsubjectdescription" data-expandable required></textarea>
                </div>
                <div class="content-full">
                    <label for="txtsubjectvideo" class="label">Video</label>
                    <textarea id="txtsubjectvideo" maxlength="2000" class="textarea" id="txtsubjectvideo" name="txtsubjectvideo" data-expandable required></textarea>
                </div>
            </div>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="/js/controls/dataexpandable.js"></script>
<script src="/js/modules/addsubject.js"></script>