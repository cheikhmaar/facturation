<?php
    require_once 'db.php';
    function addFacture($date, $consommation, $prix, $paiement){

        $sql = "INSERT INTO facture(date, consommation, prix, paiement) VALUES (:date, :consommation, :prix, :paiement)";
        $conn = getConnection();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':consommation', $consommation);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':paiement', $paiement);

        return $stmt->execute();
        
    }

    function updateFacture($idF){

        $sql = "UPDATE facture SET paiement = 1 WHERE idF = :idF";
        $conn = getConnection();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':idF', $idF);

        return $stmt->execute();
    }

    function listeFacture(){

        $sql = "SELECT * FROM facture";
        $conn = getConnection();

        return $conn->query($sql);
    }

    function listeFactureNonReglee(){

        $sql = "SELECT * FROM facture WHERE paiement = 0";
        $conn = getConnection();

        return $conn->query($sql);
    }

    function listeFactureReglee(){

        $sql = "SELECT * FROM facture WHERE paiement = 1";
        $conn = getConnection();

        return $conn->query($sql);
    }
