<?php
include '../inc/session.php';

start_session();

destroy_session();
echo read_session('cylex');

session_destroy();
setcookie(session_name(), "", 1);