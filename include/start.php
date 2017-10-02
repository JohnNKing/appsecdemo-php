<?php
    session_start();
    $GLOBALS['db'] = new PDO('sqlite:data/db');
    $GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>