<?php
$obj = new Auth();
$obj->verifyAuth($_POST['email'], $_POST['senha']);