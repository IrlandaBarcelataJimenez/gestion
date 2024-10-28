<?php
    $conn = new mysqli('localhost', 'root', '', 'pd4');

    if ($conn -> connect_error) {
        echo $error -> $conn -> connect_error;
    }