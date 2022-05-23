<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

//  form_add
unset($_SESSION['temp_subject']);
unset($_SESSION['temp_subject_name']);
unset($_SESSION['temp_subject_description']);
unset($_SESSION['temp_subject_videos']);

//  form_consult
unset($_SESSION['subject']);
unset($_SESSION['subject_career']);
unset($_SESSION['subject_career_id']);
unset($_SESSION['subject_career_name']);
unset($_SESSION['subject_name']);
unset($_SESSION['subject_description']);