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

if (!$me['bot']) {
	$dialogs = $MadelineProto->get_dialogs();
    foreach ($dialogs as $dialog) {
        $peer = $dialog['peer'];
        try {
            $Chat = $MadelineProto->get_info_full($peer);
            switch ($Chat['type']) {
                case 'user':
                    ///\danog\MadelineProto\Logger::log($Chat);
                    break;
                case 'supergroup':
                    \danog\MadelineProto\Logger::log($Chat);
                    break;
                case 'channel':
                    break;
                case 'bot':
                    break;
                case 'chat':
                    \danog\MadelineProto\Logger::log($Chat);
                    break;
                default:
                    break;
            }
        } catch (\Exception $ex) {
            \danog\MadelineProto\Logger::log($ex);
        }
    }
} else {echo 'That is bot!';}