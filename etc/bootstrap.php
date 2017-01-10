<?php

spl_autoload_register(function ($class) {
    include ROOT . 'classes/' .  $class . '.php';
});
