<?php
include "include/entete.inc.php";

if(!isset($_SESSION['login'])){
    header('location:index.php');
    exit();
}
if($_SESSION['type'] != 'admin'){
	header('location:index.php');
	exit();
}
?>
		<div class="container">
		<div class="jumbotron">
		<h1 class="text-center mt-4">Gestion Utilisateur</h1>
		<hr class="my-4">
        <div class="row justify-content-center mt-4">
				<table class="table table-bordered table-striped table-responsive-md">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Nom</th>
						<th scope="col">Prenom</th>
						<th scope="col">Mail</th>
						<th scope="col">Grade</th>
						<th scope="col">Etat</th>
					</tr>
					<?php
        			    $req = $dbh->query("SELECT * FROM photo4you.utilisateur WHERE type != 'admin'");
        			    $data = $req->fetchAll();
        			    echo '';
        			    foreach ($data as $li){
        			        echo '<tr>';
        			        echo '<th>'.$li['id_user'].'</th>';
        			        echo '<td>'.$li['Nom'].'</td>';
        			        echo '<td>'.$li['Prenom'].'</td>';
        			        echo '<td>'.$li['Mail'].'</td>';
        			        echo '<td>'.$li['Type'].'</td>';
								// * Affichage en fonction l'état, et renvoit vers modif-etat-user.php avec $_GET['id'] && $_GET['etat']
          				
							if($li['etat'] == 'banni'){
								echo '<td><a href="gestion_pdo.php?id_user='.$li['id_user'].'&etat='.$li['etat'].'"><button class="h-100 w-100 btn btn-danger">'.$li['etat'].'</td>';
							}
						
							if($li['etat'] == 'valid'){
								echo '<td><a href="gestion_pdo.php?id_user='.$li['id_user'].'&etat='.$li['etat'].'"><button class="h-100 w-100 btn btn-success">'.$li['etat'].'</td>';
							}
        			        echo '</tr/>';
        			    }
        			?>
				</table>
			</div>
			<hr class="my-4"><br><br><br><br><br><br><br>
		</div>
		</div>