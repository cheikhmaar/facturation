<?php
    require_once '../model/db.php';
    require_once '../model/reglementdb.php';
    require_once '../model/facturedb.php';

    extract($_POST);
    $result = addReglement($date, $idF);

    if ($result) {
        updateFacture($idF);
    }

    header("location:reglements");