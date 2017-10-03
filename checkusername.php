<?php
header('Content-type: application/json');

$username = $_POST['username'];

include_once 'includes/config.php';
 
$config = new dbConfig();
$db = $config->getConnection();

include_once 'includes/data.inc.php';
$user = new userData($db);

if($user->checkusername($username)){
    $isAvailable = false;
}
else{
    $isAvailable = true;
}
    echo json_encode(array(
        'valid' => $isAvailable,
    ));

?>