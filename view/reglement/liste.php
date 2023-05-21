<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facturation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
    <script type="text/js" src="main.js"></script>
</head>
<body>
    <div class="nav navbar-primary">
        <ul class="nav navbar-nav">
            <li><a href="factures">Gestion des factures</a></li>
            <li><a href="reglements">Gestion des reglements</a></li>
        </ul>
    </div>

    <div class="container col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Liste des reglements</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Date</td>
                        <td>Facture</td>
                    </tr>
                    <?php
                        require_once '../../model/reglementdb.php';
                        $reglements = listeReglement()->fetchAll();
                        foreach ($reglements as $key => $value) {
                            echo "<tr>
                                    <td>$value[1]</td>
                                    <td>$value[2]</td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>            
            <div class="panel-footer">DITI 4</div>
        </div>
    </div>

    <div class="container col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Formulaire de gestion des reglement</div>
            <div class="panel-body">
                <form action="reglementController" method="post">
                    <div class="form-group">
                        <label class="control-label" for="date">Date de reglement</label>
                        <input class="form-control" type="date" name="date" id="date"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="Facture">Facture</label>
                        <select class="form-control" type="idF" name="idF" id="idF">
                            <option disabled selected value=""> Veuillez faites votre choix </option> 
                            <?php
                                require_once '../../model/facturedb.php';
                                $factures = listeFactureNonReglee()->fetchAll();
                                foreach ($factures as $key => $value) {
                                    echo "<option value='".$value[0]."'>$value[0]</option>";
                                }
                            ?>                       
                        </select>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer"/>
                        <input class="btn btn-danger" type="reset" name="annuler" id="annuler" value="Annuler"/>
                    </div>
                </form>
            </div>            
            <div class="panel-footer">DITI 4</div>
        </div>
    </div>
    
</body>
</html>