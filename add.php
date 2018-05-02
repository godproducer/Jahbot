<?php

if (!file_exists('madeline.php')) {
	copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();

$me = $MadelineProto->get_self();

\danog\MadelineProto\Logger::log($me);
/* @var $_POST type */
$userid = $_POST["userid"];


if (!$me['bot'] && !empty($userid)) {	
	           $chat = $MadelineProto->get_info($userid); 
					try {
						$MadelineProto->messages->sendMessage(['peer' => $chat, 'message' => 'Мож шмыгнем?']);
					   echo 'Предложил шмыгнуть';
					}
					catch (\Exception $ex) {
						\danog\MadelineProto\Logger::log($ex);
					}
			} else {echo 'Нечего было трындеть!';}