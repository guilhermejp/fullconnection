<?php

if (is_array(@$message)) {
    echo "mensagem('" . $message['type'] . "', '" . @$message['message'] . "', '" . @$message['delay'] . "', '" . @$message['title'] . "');";
}
?>