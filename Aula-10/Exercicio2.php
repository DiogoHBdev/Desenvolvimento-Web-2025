<?php

    setcookie("usuario", "", time() - 3600);

    if(!isset($_COOKIE["usuario"])) {
        echo 'O cookie não exixte';
    } else {
        echo 'O valor é ' . $_COOKIE["usuario"];
    }
