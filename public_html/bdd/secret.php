<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>BDD</title>
		<meta charset="UTF-8">
	</head>
	<body>
    
        <?php
	if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "160801") // Si le mot de passe est bon
	{
	// On affiche les codes
	
		require "connexion.php";


$query = 'SELECT * FROM inscription';
$response = $bdd->query($query);

$table = '
<table>
<tr>
<td>Id</td>
<td>Nom</td>
<td>Mail</td>
<td>Tel</td>
<td>Infos</td>
<td>Voiture</td>
<td>Médecin</td>
<td>Déjà participé</td>
<td>Appétissant</td>
</tr>';

foreach  ($bdd->query($query) as $row) {
        $table = $table.'<tr>';
		$table = $table.'<td>'.$row['id'].'</td>';
		$table = $table.'<td>'.$row['name'].'</td>';
		$table = $table.'<td>'.$row['mail'].'</td>';
		$table = $table.'<td>'.$row['phone'].'</td>';
		$table = $table.'<td>'.$row['information'].'</td>';
		$table = $table.'<td>'.$row['car'].'</td>';
		$table = $table.'<td>'.$row['doc'].'</td>';
		$table = $table.'<td>'.$row['zombie'].'</td>';
		$table = $table.'<td>'.$row['appetizing'].'</td>';
		$table = $table.'</tr>';
  }
  $table = $table.'</table>';
 
  echo $table;
	}
	else // Sinon, on affiche un message d'erreur
	{
		echo '<p>Mot de passe incorrect</p>';
	}
	?>
	
        
	</body>
</html>