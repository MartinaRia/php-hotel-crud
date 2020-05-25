<?php
    header('Content-Type: application/json');
    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'hoteldb';
    $conn = new mysqli($server, $username, $password, $dbName); //apertura connessione
    if ($conn -> connect_errno) {
        echo $conn -> connect_errno;
        return;
    }
    $sql = "
        SELECT status, price
        FROM pagamenti
        ORDER BY price ASC
    ";
    $results = $conn -> query($sql);
    if ($results -> num_rows < 1) {
        echo "no result";
        return;
    }
    $res = [];
    while ($row = $results -> fetch_assoc()) {
        $res[] = "eur" . " " . $row['price'] . " " . $row['status'];
    }
    // var_dump($res);
    $conn -> close(); // chiusura connessione

    echo json_encode($res);
