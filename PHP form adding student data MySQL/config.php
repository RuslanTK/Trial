<?php
error_reporting(-1);
$db = mysqli_connect('127.0.0.1', 'root', '', 'hw07_01') or die('Ошибка соединения с базой данных');
mysqli_set_charset($db, 'utf8') or die('Не установлена кодировка');

