<?php

$database = mysqli_connect('localhost', 'root', null, 'exam');

if(!$database) {
    die('Connection failed: ' . mysqli_connect_error());
}