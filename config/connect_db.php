<?php
    function db_connect() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db   = 'manga_db';
        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die('Kết nối database thất bại: ' . $conn->connect_error);
        }
        $conn->set_charset('utf8');
        return $conn;
    }
?>