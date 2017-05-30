<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profil</title>
		<link rel="stylesheet" href="../bootstrap-css/bootstrap.min.css">
		<link rel="stylesheet" href="../style/css/christopher.css">
	</head>
	<body>
		<div align="center">
			<h2>Profil de <!-- futur code php qui indiquera le pseudo de l'utilisateur --> </h2>
			<table class="table table-bordered profil-table">
				<tr>
					<th>Pseudo</th>
					<th>Mail</th>
					<th>Actions</th>
				</tr>
				<tr>
					<td> <!-- futur code php qui indiquera le pseudo de l'utilisateur --></td>
					<td> <!-- futur code php qui indiquera l'email de l'utilisateur --></td>
					<td>
						<input onclick=window.location.href="editionprofil.php" type="button" class="btn btn-primary" name="" value="Editer mon profil">
						<input onclick=window.location.href="deconnexion.php" type="button" class="btn btn-danger" name="" value="Déconnexion">
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
