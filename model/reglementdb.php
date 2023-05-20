<?php
    require_once 'db.php';
    require_once 'facturedb.php';

    function addReglement($date, $idF) {
        $sql = "INSERT INTO reglement (date, idF) VALUES (:date, :idF)";
        $conn = getConnection();
        $stmt = $conn->prepare($sql);
    
        $date = date('Y-m-d', strtotime($date));
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':idF', $idF);
    
        return $stmt->execute();
    }
    

    function listeReglement(){

        $sql = "SELECT * FROM reglement";
        $conn = getConnection();

        return $conn->query($sql);
    }
