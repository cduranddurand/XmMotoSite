<?php
    include ("include/entete.inc.php");
	$_SESSION['panier'] = array();
    if($_SESSION['login']!=TRUE)
    {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>XM MOTO</title>
	</head>
	<body>
		<div class="px-4 py-5 my-5 text-center">
			<h1 class="display-5 fw-bold">Votre paiment à était accepter</h1>
				<a href="#"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Consulter la facture </button></a>
		</div>
	</body>
</html>