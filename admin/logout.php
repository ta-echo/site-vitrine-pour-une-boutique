<?php

include("../constant.php");
include("../security/user_session.php");

$user_session = UserSession::getCurrentSession();
$user_session->disconnect();
header('Location: login.php');

?>