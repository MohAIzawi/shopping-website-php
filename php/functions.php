<?php
    require "./config.php";

    function dbConnect() {
        global $server_Name, $user_Name, $password, $db_Name;
        $mysqli = new mysqli($server_Name, $user_Name, $password, $db_Name);
        if ($mysqli->connect_error) {
            die("Failed to connect to MySQL: " . $mysqli->connect_error);
        }
        return $mysqli;
    }

    
    function getCategories () {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM products");
        if ($result === FALSE) {
            die("Failed to query the database: " . $mysqli->error);
        }
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function getHomePageProducts($int){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM products LIMIT $int");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function getAboutProducts($int){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM products_2 LIMIT $int");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function getProductsByCategory($category) {
        $mysqli = dbConnect();

        $smpt = $mysqli->prepare("SELECT * FROM products WHERE category = ?");
        $smpt->bind_param("s", $category);
        $smpt->execute();
        $result = $smpt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    function getProductByTitle($title) {
        $mysqli = dbConnect();

        $smpt = $mysqli->prepare("SELECT * FROM products WHERE title = ?");
        $smpt->bind_param("s", $title);
        $smpt->execute();
        $result = $smpt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }