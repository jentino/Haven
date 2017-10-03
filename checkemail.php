<?php
header('Content-type: application/json');

$email = $_POST['email'];

include_once 'includes/config.php';
 
$config = new dbConfig();

$db = $config->getConnection();

include_once 'includes/data.inc.php';
$user = new userData($db);

if($user->checkemail($email)){
    $isAvailable = false;
}
else{
    $isAvailable = true;
}
    echo json_encode(array(
        'valid' => $isAvailable,
    ));
?>