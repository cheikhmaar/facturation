<?php
    require_once '../model/facturedb.php';
    if ($_POST['envoyer']) {
        extract($_POST);
        $result = addFacture($date, $consommation, $prix, 0);

        header("location:factures");
    }
    