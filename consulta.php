<?php

if (isset ($_POST['api'])) {

    $api = $_POST['api'];

    if ($api == 'viacep') {
        require_once('viacep.php');
    } else if ($api == 'postmon') {
        require_once('postmon.php');
    }
    else {
        require_once('cepaberto.php');
    }
$address = getAddress();
}

