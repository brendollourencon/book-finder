<?php
$obj = new Auth();
$result = $obj->doAuth($_POST['email'], $_POST['senha']);

if ($result) {
    http_response_code(200);
    exit($_SESSION['Auth']['name']);
}
else {
    http_response_code(401);
}