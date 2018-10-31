<?php require "header.php"; 
require "menu.php";
require "functions.php";
session_start();
echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
echo '<script type="text/javascript" src="js/jquery.tablesorter.js"></script>';
$year = '';
if(isset($_POST['year'])) {
	$year = $_POST['year'];
} else if (isset($_GET['year'])) {
	$year =$_GET['year'];
} else if (isset($_SESSION['year'])) {
	$year = $_SESSION['year'];
}

if(isset($_GET['printMode'])) {
echo '<link rel="stylesheet" type="text/css" href="style_print.css">';
}
?>

    <div id="container" class="secret">

<div id = "content">
        <?php
	if (((isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "160801") || session_id()!='') AND $year != '') // Si le mot de passe est bon
	{
		
		$_SESSION['id'] = "160801";
		$_SESSION['year'] = $_POST['year'];
		// On affiche les codes
		
		require "connexion.php";
		?>
		<div id="title"><h1>Inscrits <?php echo $year?></h1>
		<h2><a href="bdd.php">Retour</a></h2>
		</div>
		
		<?php
		if($year>2015) {
			$query = 'SELECT * FROM `inscription`,`menu` WHERE YEAR(year)='.$year.' AND `inscription`.`menu_id` = `menu`.`menu_id`'; 
		} else {
			$query = 'SELECT * FROM `inscription` WHERE YEAR(year)='.$year;
		}
		$response = $bdd->query($query);
		
		$querymenu = 'SELECT * FROM menu';
		$responsemenu = $bdd->query($querymenu);
		$menu = $responsemenu->fetch();
		
		$table = '
		<div class="texte intro">
		<table id="inscrits" class="inscrits tablesorter" cellspacing="0" cellpadding="0">
		<thead>
		<tr>
		<th>Id</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Mail</th>
		<th>Tel</th>
		<th>Infos</th>
		<th>Menu</th>
		<th>Options</th>
		<th>Prix</th>
		<th>Validation</th>
		</tr></thead><tbody>';
		$count = 0;
		$doc=0;
		$car=0;
		$zombie=0;
		foreach  ($response as $row) {
			$count++;
			$infos = '';
			if($row['car']!=0) {
				$car++;
				$infos=$infos."Conducteur. ";
			}
			if($row['doc']!=0) {
				$doc++;
				$infos=$infos."Secouriste. ";
			}
			if($row['zombie']!=0) {
				$zombie++;
				$infos=$infos."Vétéran. ";
			}
			if($infos!='' && $row['information'] != '') {
				$infos = $infos.'<br/>'.$row['information'];
			}
			
			$queryOptionResult = 'SELECT * FROM `option`,`option_inscription` WHERE `option_inscription`.`inscription_id` = '.$row['id'].' AND `option_inscription`.`option_id` = `option`.`option_id`';
			$responseOptionResult = $bdd->query($queryOptionResult);

			$priceAndOpt = Options($responseOptionResult,"<br/>");
			$optionsString=$priceAndOpt['options'];
			$price = $priceAndOpt['price'];
			
				$table = $table.'<tr id="'.$row['id'].'">';
				$table = $table.'<td><div><a title="Edit" href="edit.php?id='.$row['id'].'">'.$row['id'].'</a></div></td>';
				$table = $table.'<td><div>'.$row['name'].'</div></td>';
				$table = $table.'<td><div>'.$row['firstname'].'</div></td>';
				$table = $table.'<td><div>'.$row['mail'].'</div></td>';
				$table = $table.'<td><div>'.$row['phone'].'</div></td>';
				$table = $table.'<td><div>'.$infos.'</div></td>';
				$table = $table.'<td><div>'.$row['menu_name'].'</div></td>';
				$table = $table.'<td><div>'.$optionsString.'</div></td>';
				$table = $table.'<td><div>'.$price.'€</div></td>';
				$table = $table.'<td><div>'.''.'</div></td>';
				$table = $table.'</tr>';
		}
		$table = $table.'</tbody></table></div>';
		?>
		
		<?php 
		$queryOption = 'SELECT * FROM `option`';
		$responseOption = $bdd->query($queryOption);
			
		?>
		<div class="texte">
		<table>
			<tr>
			<td>
			<ul>
				<li>Nombre d'inscrits : <font class="red"><?php echo $count ?></font></li>
				<li>Ayant déjà participé : <font class="red"><?php echo $zombie ?></font></li>
				<li>Secouristes : <font class="red"><?php echo $doc ?></font></li>
				<li>Conducteurs : <font class="red"><?php echo $car ?></font></li>
			</ul>
			</td>
			<td>
			<ul>
			<?php 
				$queryCount = 'SELECT `menu`.`menu_name`,`menu`.`menu_recipe`,COUNT(*) FROM `inscription`,`menu` WHERE YEAR(year)='.$year.' AND `inscription`.`menu_id`=`menu`.`menu_id` GROUP BY `menu`.`menu_id`';
				$responseCount = $bdd->query($queryCount);
				foreach($responseCount as $rowOption) {
					$reporting = $rowOption['2'];
					$optionReporting = '<li>'.$rowOption['menu_name'].' : <font class="red">'.$reporting.'</font> ('.$rowOption['menu_recipe'].')</li>';
					echo $optionReporting;
				}					
			?>
			</ul>
			</td>
			<td>
			<ul>
			<?php 
				$queryCount = 'SELECT `option`.`option_shortname`,`option`.`option_price`,COUNT(*) FROM `inscription`,`option_inscription`,`option` WHERE YEAR(year)='.$year.' AND `inscription`.`id`=`option_inscription`.`inscription_id` AND `option_inscription`.`option_id`=`option`.`option_id` GROUP BY `option`.`option_id`';
				$responseCount = $bdd->query($queryCount);
				foreach($responseCount as $rowOption) {
					$reporting = $rowOption['2'];
					$price = $reporting*$rowOption['option_price'];
					$optionReporting = '<li>'.$rowOption['option_shortname'].' : <font class="red">'.$reporting.'</font> ('.$price.'€)</li>';
					echo $optionReporting;
				}					
			?>
			</ul>
			</td>
			<td>
			<ul>
				<li>
					<a href="download.php">Download</a>
					
					
				</li>
				<li>
					<a href="secret.php?printMode=true&year=<?php echo $year; ?>">Print</a>
				</li>
			</ul>
			</td>
			</tr>
		</table>
		<ul>
			
			
			
			
			
			
			
			
		</ul>
		</div>
		<?php
		echo $table;
	}
	else // Sinon, on affiche un message d'erreur
	{
		echo '<p>Mot de passe incorrect</p>';
	}
	?>
	</div>
	</div>
<script type="text/javascript">
<?php if(!isset($_GET['printMode'])) {?>
$(document).ready(function() 
    { 
        $("#inscrits").tablesorter(); 
    } 
);
<?php } else { ?>
$(document).ready(function() 
    { 
        $("#inscrits").tablesorter({  
        sortList: [[1,0],[2,0],[0,0]] 
    }); 
    } 
);
window.print();
<?php } ?>

</script>
<?php require "footer.php"; ?>	