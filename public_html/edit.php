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
} 

$id = '';
if(isset($_POST['id'])) {
	$id = $_POST['id'];
} else if (isset($_GET['id'])) {
	$id =$_GET['id'];
} 

if(isset($_GET['printMode'])) {
echo '<link rel="stylesheet" type="text/css" href="style_print.css">';
}
?>

    <div id="container" class="secret">

<div id = "content">
        <?php
	if (((isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "160801") || session_id()!='') && isset($id)) // Si l'id d'edition est présetn
	{
		require "connexion.php";
		$id ="";
		$name="";
		$firstname="";
		$phone="";
		$mail="";
		$infos="";
		$currentMenu="";
		$check1="";
		$check2="";
		$check3="";
		$check4="";
		
		$currentOptions = array();
		
		$id = $_GET['id'];
		$query = 'SELECT * FROM `inscription`,`menu` WHERE  `inscription`.`id` ='.$id.' AND `inscription`.`menu_id` = `menu`.`menu_id`'; 
		$response = $bdd->query($query);
		foreach ($response as $row) {
			$id = $row['id'];
			$name= $row['name'];
			$firstname= $row['firstname'];
			$phone= $row['phone'];
			$mail= $row['mail'];
			$currentMenu= $row['menu_id'];
			$infos= $row['information'];
			
			/*Infos Checkbox*/
			if($row['car']!=0) {	
				$check1="checked";
			}
			if($row['doc']!=0) {
				$check2="checked";
			}
			if($row['zombie']!=0) {
				$check3="checked";
			}
			if($row['appetizing'] != '') {
				$check4="checked";
			}
		}
		
		
		
		$queryOptionResult = 'SELECT `option`.`option_id`  FROM `option`,`option_inscription` WHERE `option_inscription`.`inscription_id` = '.$id.' AND `option_inscription`.`option_id` = `option`.`option_id`';
		
		
		$responseOptions = $bdd->query($queryOptionResult);
		foreach ($responseOptions as $row) {
			$currentOptions[] = $row['option_id'];
		}
			
			
		
		
		/*Options*/
		$queryoption = 'SELECT * FROM `option`';
		$responseoption = $bdd->query($queryoption);
		$option ='';
		foreach  ($responseoption as $row) {
			if($row['active']==1) {
				$checked="";
				if(isset($currentOptions)) {
					foreach($currentOptions as $current) {
						if($current == $row['option_id']) {
							$checked="checked";
						}
					}
				}
				$option=$option.'<input '.$checked.' type="checkbox" name="option[]" id="option_'.$row['option_id'].'" value="'.$row['option_id'].'"/><label class="checkboxlabel">'.$row['option_name'].'  ('.$row['option_price'].'€)</label><br/>';
			}
		}
		/*Menus disponibles*/
		$querymenu = 'SELECT * FROM menu';
		$responsemenu = $bdd->query($querymenu);
		$menu ='<option></option>';
		foreach  ($responsemenu as $row) {
			$selected="";
			if($currentMenu == $row['menu_id']) {
				$selected="selected";
			}
			$menu=$menu.'<option '.$selected.' id="menu'.$row['menu_id'].'" value="'.$row['menu_id'].'">'.$row['menu_name'].'<span> - '.$row['menu_recipe'].'</span></option>';
		}
		
		
		
		$form = '<form action="edit.php" class="formulaire" method="post">
	<table>
	<tr><td><label>Edition de l\'inscrit</label></td><td><label>'.$id.'</label><input type="hidden" name="id" value="'.$id.'"/></td></tr>
	<tr><td><label>Suppression</label></td><td><input type="radio" name="delete" value="yes"/><label>Delete</label><input type="radio" name="delete" value="no" checked/><label>Do not delete</label></td></tr>
	<tr><td><label>Nom et prénom * </label> </td><td><input placeholder="NOM" id="name" type="text" name="name" value="'.$name.'"/>
	<input id="firstname" placeholder="PRENOM" type="text" name="firstname" value="'.$firstname.'"/></td></tr>
	<tr><td><label>Mail* </label></td><td><input type="text" name="mail" value="'.$mail.'"/></td></tr>
	<tr><td><label>Téléphone * </label></td><td><input type="text" name="phone" value="'.$phone.'"/></td></tr>
	<tr><td><label>Sandwich * </label></td><td class="radiolabel"><select name="menuid"> '.$menu.'</select></td></tr>
	<tr class="spaceinput"><td><label>Options </label></td><td>'.$option.'</td></tr>
	<tr><td><label>Renseignements </label></td><td><textarea name="renseignement" placeholder="Allergies, sandwichs en plus, etc." >'.$infos.'</textarea></td></tr>
	<tr class="spaceinput"><td><label>Infos pratiques </label></td><td>
	<input '.$check1.' type="checkbox" name="checkbox0" id="field1" value="1"><label class="checkboxlabel">Vous êtes conducteur et vous aurez une voiture.</label><br/>
	<input '.$check2.' type="checkbox" name="checkbox1" id="field2" value="1"><label class="checkboxlabel">Vous êtes secouriste, infirmier, médecin.</label><br/>
	<input '.$check3.' type="checkbox" name="checkbox2" id="field3" value="1"><label class="checkboxlabel">Vous avez déjà participé à une soirée zombies.</label><br/>
	<input '.$check4.' type="checkbox" name="checkbox3" id="field4" value="1"><label class="checkboxlabel">Vous êtes appétissant.</label><br/>
	</td></tr>
	<tr><td>Les champs suivis d\'un * doivent être remplis.</td><td></td></tr>
	<tr>
	<td><input type="submit" value="Inscription"/></td><td>

	<input type="hidden" name="edit" value="ok">
	</td>
	</tr>
	</table>
	</form>';
		

		
		
	if (!empty($_POST['edit'])) {

		$id = $_POST['id'];

		$email   = (isset($_POST['mail']))   ? Rec($_POST['mail'])   : '';
		
		
		$phone   = (isset($_POST['phone']))   ? $_POST['phone']   : '';
		
		if (!empty($_POST['id'])&&!empty($_POST['name'])&& !empty($_POST['firstname']) && !empty($_POST['menuid']) && ($email != '') && ($phone != '')) {



			require "connexion.php";
			
			/*Reset des options*/
			$queryDeleteOpt = 'DELETE from `option_inscription` WHERE `option_inscription`.`inscription_id`='.$id;
			$responseDeleteOpt = $bdd->query($queryDeleteOpt);
			
			/*Suppression de l'inscription si demandé */ 
			if($_POST['delete'] == 'yes') {
				$query ="DELETE from `inscription` WHERE `inscription`.`id`=".$id;
				$response = $bdd->query($query);
			} else {
				$query ="UPDATE inscription SET name = '".$_POST['name']."', firstname='".$_POST['firstname']."', mail = '".$email."', phone = '".$phone."', information = '".$_POST['renseignement']."', car = '".$_POST['checkbox0']."', doc ='".$_POST['checkbox1']."', zombie = '".$_POST['checkbox2']."', appetizing = '".$_POST['checkbox3']."', menu_id = '".$_POST['menuid']."'  WHERE `inscription`.`id`=".$id;
				$response = $bdd->query($query);

				$inscription_id = $id;

				

				$responseOpt ='';
				if(!empty($_POST['option'])) {
					
					$queryOpt = 'INSERT INTO `option_inscription` VALUES';
					foreach($_POST['option'] as $opt) {
						$queryOpt = $queryOpt. '("","'.$inscription_id.'","'.$opt.'" ),';
					}
					$queryOpt = substr($queryOpt, 0, -1);
					$responseOpt = $bdd->query($queryOpt);
				}
				 
			}
			header('Location: secret.php#'.$id); 
		} else {
		$form ='<ul><li>Votre inscription n\'a pas fonctionné, vérifiez que le formulaire est correctement rempli.</li></ul>'.$form;
		}
	}	
		
		
		
	echo $form;	
		
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