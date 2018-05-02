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
$msg = $_POST["msgtext"];

if (!$me['bot'] && !empty($msg)) {
	$dialogs = $MadelineProto->get_dialogs();
	foreach ($dialogs as $peer) {
		foreach($peer as $key => $value) {
			if ($key==='_') {
				if ($value!=='peerChannel') {
					try {
						$MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => $msg ]);
					}
					catch (\Exception $ex) {
						\danog\MadelineProto\Logger::log($ex);
					}
				}
			}
		}
	}
        echo 'Вроди всем подрассказал!';
} else {echo 'Нечего было трындеть!';}