<?php

// futur code php qui vérifiera que l'utilisateur existe


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Connexion</title>
    <link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
	</head>
	<body>
		<div align="center">
			<h2>Connexion</h2>
      <div class="container-fluid">
        <div class="row">
    			<form class="well col-md-offset-3 col-md-6" method="POST" action="">
            <div class="form-group">
    				  <label for="mailconnect">Mail :</label>
    				  <input class="form-control" type="email" id="mailconnect" name="mailconnect" placeholder="Mail">
            </div>
            <div class="form-group">
    				  <label for="mdpconnect">Mot de passe :</label>
              <input class="form-control" type="password" id="mdpconnect" name="mdpconnect" placeholder="Mot de passe">
            </div>
    				<input type="submit" name="forminscription" value="Connexion">
    			</form>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <!-- futur code php pour prévenir des erreurs lors de la connexion (mauvais mail / mot de passe) -->
          Pas encore de compte ? <a href="inscription.php">Inscrivez-vous</a> !
        </div>
      </div>
		</div>
    <script src="../js/bootstrap.js"></script>
	</body>
</html>
