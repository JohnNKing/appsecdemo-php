<?php
    // DEMO: Session cookie security (secure & httponly flags)
    /*
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params(
        $cookieParams['lifetime'],
        $cookieParams['path'],
        $cookieParams['domain'],
        true,
        true
    );
    */

    session_start();
    $GLOBALS['db'] = new PDO('sqlite:data/db');
    $GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>