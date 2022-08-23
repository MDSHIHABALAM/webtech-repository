<?php 
    function connect() {
        $server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $dbname = "online grocery";
        $ezl = new mysqli($server, $db_user, $db_pass, $dbname);

        if ($ezl->connect_error) {
            die("Database Connection failed: " . $ezl->connect_error);
        }

        return $ezl;
    }
?>