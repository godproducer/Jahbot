<?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->settings['peer']['cache_all_peers_on_startup'] = true;
$MadelineProto->start();

$me = $MadelineProto->get_self();

\danog\MadelineProto\Logger::log($me);


if (!$me['bot']) {
    $dialogsAll = $MadelineProto->messages->getDialogs(['exclude_pinned' => false, 'offset_date' => 0, 'offset_id' => 0, 'limit' => 0,]);
    $dialogs = $dialogsAll['dialogs'];
    $vHtml = '<table border = "1"><thead><tr><th>Тип</th><th>Ид</th><th>Название</th><th>Новыйх сообщений</th></tr></thead><tbody>';
    foreach ($dialogs as $dialog) {
        $unreadCount = $dialog['unread_count'];
        $peer = $dialog['peer'];
        try {
            $Chat = $MadelineProto->get_info_full($peer);
            switch ($Chat['type']) {
                case 'user':
                    $vHtml .= sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>', 'Тело', $Chat['user_id'], $Chat['User']['username'], $unreadCount);
                    break;
                case 'supergroup':
                    $vHtml .= sprintf('<tr><td>%s</td><td>%s</td><td><a href="http://t.me/%s">%s</a></td><td>%s</td></tr>', 'Суперкодло', $Chat['channel_id'], $Chat['Chat']['username'], $Chat['Chat']['title'], $unreadCount);
                    break;
                case 'channel':
                    $vHtml .= sprintf('<tr><td>%s</td><td>%s</td><td><a href="http://t.me/%s">%s</a></td><td>%s</td></tr>', 'Спамолента', $Chat['channel_id'], $Chat['Chat']['username'], $Chat['Chat']['title'], $unreadCount);
                    break;
                case 'bot':
                    $vHtml .= sprintf('<tr><td>%s</td><td>%s</td><td><a href="http://t.me/%s">%s</a></td><td>%s</td></tr>', 'Говнобот', $Chat['user_id'], $Chat['Chat']['username'], $Chat['Chat']['first_name'], $unreadCount);
                    break;
                case 'chat':
                    $vHtml .= sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>', 'Кодло обычное', $Chat['chat_id'], $Chat['Chat']['title'], $unreadCount);
                    break;
                default:
                    $vHtml .= sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>', $Chat['type'], 'Unknown', 'Unknown', $unreadCount);
                    break;
            }
        } catch (\Exception $ex) {
            \danog\MadelineProto\Logger::log($ex);
        }
    }
    echo (sprintf('%s</tbody></table>', $vHtml));
}
