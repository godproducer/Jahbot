<?php
include 'madeline.php';
$id = $_REQUEST['id'];
$MadelineProto = new \danog\MadelineProto\API('jah.session'); 
$MadelineProto->start(); 
$Chat = $MadelineProto->get_info($id);
\danog\MadelineProto\Logger::log($Chat);
?>