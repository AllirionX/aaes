<?php require "header.php";
echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
require "functions.php";
#require "connexion.php";
require "menu.php"; 
$closed = true;
$quota = true;
?>
<!--
$queryBenevoleCount = 'SELECT COUNT(*) FROM `inscription`,`option_inscription` WHERE `option_inscription`.`inscription_id` = `inscription`.`id` AND `option_inscription`.`option_id` = 6 AND YEAR(year)=YEAR(NOW())';
	$responseBenevoleCount = $bdd->query($queryBenevoleCount);
$queryCount = 'SELECT COUNT(*) FROM inscription WHERE YEAR(year)=2016';
	$responseCount = $bdd->query($queryCount);
	if($responseCount->fetchColumn() - $responseBenevoleCount->fetchColumn() > 200) {
		$quota = false;
	}
	
?>
-->



<div id="container">

<div id = "content">
<div class="texte">
<h2>Seuls les <span class="red">inscrits web</span> auront droit à un repas.

<h2><span class="red">Important :</span> Les mineurs de moins de 16 ans ne sont pas admis à la soirée zombie. Les 16-18 ans doivent obligatoirement fournir lors de l'inscription l'autorisation parentale suivante remplie et signée : <a href="docs/autorisation.pdf">Autorisation parentale</a></h2>
</div>
<iframe id="haWidget" src="https://www.helloasso.com/associations/amicale-des-amateurs-d-excursions-scenarisees-aaes/evenements/soiree-zombie-2017/widget" style="width:800px;height:750px;border:none;margin:0 auto;"></iframe>
<div style="width:800px;text-align:center;">Propulsé par <a href="https://www.helloasso.com" rel="nofollow">HelloAsso</a></div>
<!--
<div id ="title">
<h1>Réservation</h1>
<h2>25 Juin 2016, Soirée Zombies</h2>
</div>

<div class="texte">
<iframe id="haWidget" src="https://www.helloasso.com/associations/amicale-des-amateurs-d-excursions-scenarisees-aaes/evenements/soiree-zombie-2017/widget" style="width:800px;height:750px;border:none;"></iframe>
<div style="width:800px;text-align:center;">Propulsé par <a href="https://www.helloasso.com" rel="nofollow">HelloAsso</a></div>
<h2>Infos</h2>
<ul>
<li>Tarif de la soirée: <span class="reddark">5€</span></li>
<li>Vous pouvez réserver un repas gratuit jusqu'au 18 Juin.</li>
<li>Avant de vous inscrire, prenez connaissance des <a href="rules.php">Regles</a>.</li>
<li>N'oubliez pas votre matériel.</li>
</ul>
<h2>Horaires et accès</h2>

<ul>


<li>Rendez-vous le 25 Juin 2015 à 21h30 au parc du Biez, à Mondeville.</li>
<li>Adresse : 2-6 rue Calmette, Mondeville (bus n.9, arrêt Résidence du parc).</li>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20865.597867603836!2d-0.3153238003706951!3d49.17779642738032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480a6843bcd87ac3%3A0x94023a13d20e4370!2s6+Rue+Calmette!5e0!3m2!1sfr!2sfr!4v1402724251853" width="400" height="300" frameborder="0" style="border:0"></iframe>

<--
<li>Rendez-vous le 25 Juin 2016 à 21h au bois de Lebisey, Hérouville.</li>
<li>Adresse : 1 avenue du Haut Crépon, Hérouville (bus n.4, arrêt Gymnase Humbert).</li>

<iframe width="500" height="300" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJI74KO-VnCkgRpH6g77OPHVk&key=AIzaSyBeQnE3lkSWog7zow56UsFeZcQd393WEQA" allowfullscreen></iframe>
-!->


</ul>

<div id="preinscription"> <h2>Réservation</h2>
<!--<form action="inscription.php" class="formulaire" method="post">
<table>
<tr><td><label>Nom et prénom* </label> </td><td><input type="text" name="name"/></td></tr>
<tr><td><label>Mail* </label></td><td><input type="text" name="mail"/></td></tr>
<tr><td><label>Téléphone* </label></td><td><input type="text" name="phone"/></td></tr>
<tr><td><label>Renseignements </label></td><td><textarea name="renseignement" ></textarea></td></tr>
<tr><td><label>Infos pratiques </label></td><td>
<input type="checkbox" name="checkbox" id="field1" value="1"><label class="checkboxlabel">Vous êtes conducteur et vous aurez une voiture.</label><br/>
<input type="checkbox" name="checkbox" id="field2" value="1"><label class="checkboxlabel">Vous êtes secouriste, infirmier, médecin.</label><br/>
<input type="checkbox" name="checkbox" id="field3" value="1"><label class="checkboxlabel">Vous avez déjà participé à une soirée zombies.</label><br/>
<input type="checkbox" name="checkbox" id="field4" value="1"><label class="checkboxlabel">Vous êtes appétissant.</label><br/>
</td></tr>
<tr>
<td><input type="submit" value="Inscription"/></td><td>

<input type="hidden" name="validation" value="ok">
</td>
</tr>
</table>
</form>-!->


<?php

if ($closed) {
$form = '<ul><li>Les pré-inscriptions sont closes. Si vous souhaitez nous confirmer votre présence, contactez nous par mail : <span class="reddark">asso.aaes@gmail.com</span></li></ul>';
} else if (!$quota) {
$form = '<ul><li>Il n\'y a plus de places disponibles à la réservation. Contactez nous par mail : <span class="reddark">asso.aaes@gmail.com</span></li></ul>';

} else {
	//Récupération de la configuration de l'inscription en base
	require "connexion.php";
	$querymenu = 'SELECT * FROM menu';
	$responsemenu = $bdd->query($querymenu);
	$menu ='<option></option>';
	foreach  ($responsemenu as $row) {
		$menu=$menu.'<option id="menu'.$row['menu_id'].'" value="'.$row['menu_id'].'">'.$row['menu_name'].'<span> - '.$row['menu_recipe'].'</span></option>';
	}
	
	$queryoption = 'SELECT * FROM `option`';
	$responseoption = $bdd->query($queryoption);
	$option ='';
	foreach  ($responseoption as $row) {
		if($row['active']==1) {
			$option=$option.'<input type="checkbox" name="option[]" id="option_'.$row['option_id'].'" value="'.$row['option_id'].'"/><label class="checkboxlabel">'.$row['option_name'].'  ('.$row['option_price'].'€)</label><br/>';
		}
	}
	
$form = '<form action="inscription.php#preinscription" class="formulaire" method="post">
<table>
<tr><td><label>Nom et prénom * </label> </td><td><input placeholder="NOM" id="name" type="text" name="name"/><input id="firstname" placeholder="PRENOM" type="text" name="firstname"/></td></tr>
<tr><td><label>Mail* </label></td><td><input type="text" name="mail" /></td></tr>
<tr><td><label>Téléphone * </label></td><td><input type="text" name="phone" /></td></tr>
<tr><td><label>Sandwich * </label></td><td class="radiolabel"><select name="menuid"> '.$menu.'</select></td></tr>
<tr class="spaceinput"><td><label>Options </label></td><td>'.$option.'</td></tr>
<tr><td><label>Renseignements </label></td><td><textarea name="renseignement" placeholder="Allergies, sandwichs en plus, etc." ></textarea></td></tr>
<tr class="spaceinput"><td><label>Infos pratiques </label></td><td>
<input type="checkbox" name="checkbox0" id="field1" value="1"><label class="checkboxlabel">Vous êtes conducteur et vous aurez une voiture.</label><br/>
<input type="checkbox" name="checkbox1" id="field2" value="1"><label class="checkboxlabel">Vous êtes secouriste, infirmier, médecin.</label><br/>
<input type="checkbox" name="checkbox2" id="field3" value="1"><label class="checkboxlabel">Vous avez déjà participé à une soirée zombies.</label><br/>
<input type="checkbox" name="checkbox3" id="field4" value="1"><label class="checkboxlabel">Vous êtes appétissant.</label><br/>
</td></tr>
<tr><td>Les champs suivis d\'un * doivent être remplis.</td><td></td></tr>
<tr>
<td><input type="submit" value="Inscription"/></td><td>

<input type="hidden" name="validation" value="ok">
</td>
</tr>
</table>
</form>';

if (!empty($_POST['validation'])) {



	$email   = (isset($_POST['mail']))   ? Rec($_POST['mail'])   : '';
	
	
	$phone   = (isset($_POST['phone']))   ? $_POST['phone']   : '';
	
if (!empty($_POST['name'])&& !empty($_POST['firstname']) && !empty($_POST['menuid']) && ($email != '') && ($phone != '')) {



require "connexion.php";

$query = 'INSERT INTO inscription VALUES ("","'.$_POST['name'].'","'.$_POST['firstname'].'","'.$email.'","'.$phone.'","'.$_POST['renseignement'].'","'.$_POST['checkbox0'].'","'.$_POST['checkbox1'].'","'.$_POST['checkbox2'].'","'.$_POST['checkbox3'].'",CURDATE(),"'.$_POST['menuid'].'")';
$response = $bdd->query($query);

$inscription_id = $bdd -> lastInsertId();
$responseOpt ='';
if(!empty($_POST['option'])) {
	$queryOpt = 'INSERT INTO `option_inscription` VALUES';
    foreach($_POST['option'] as $opt) {
        $queryOpt = $queryOpt. '("","'.$inscription_id.'","'.$opt.'" ),';
    }
	$queryOpt = substr($queryOpt, 0, -1);
	$responseOpt = $bdd->query($queryOpt);
}

$queryResult = 'SELECT * FROM `inscription`,`option`,`menu`,`option_inscription` WHERE `inscription`.`id`='.$inscription_id.' AND `inscription`.`menu_id`= `menu`.`menu_id`';
$responseResult = $bdd->query($queryResult);
$result = $responseResult->fetch();

$queryOptionResult = 'SELECT * FROM `option`,`option_inscription` WHERE `option_inscription`.`inscription_id` = '.$inscription_id.' AND `option_inscription`.`option_id` = `option`.`option_id`';
$responseOptionResult = $bdd->query($queryOptionResult);

$priceAndOpt = Options($responseOptionResult,"\r\n");
$optionsString=$priceAndOpt['options'];
$price = $priceAndOpt['price'];

$form ='<ul><li>Votre inscription a bien été prise en compte ! <br>Vous devriez recevoir un mail de confirmation d\'ici quelques minutes. Si ce n\'est pas le cas, pensez à regarder dans vos courriers indésirables.</li></ul>';

$to      = 'personne@example.com';
$subject = "AAES - Confirmation d'inscription à la soirée zombie 2016";
$message = 'Bonjour '.$_POST['firstname'].',' . "\r\n" . "\r\n" .
'Votre inscription pour la soirée du 25 juin 2016, a bien été prise en compte.' . "\r\n" .
'Où ? Parc du Biez (2-6 rue Calmette 14120 Mondeville).' . "\r\n" .
'Quand ? Samedi 25 Juin, 21h30.' . "\r\n" . "\r\n" .
'Pour plus d\'informations, n\'hésitez pas à consulter :' . "\r\n" .
'- notre site web asso-aaes.fr' . "\r\n" . 
'- notre page facebook https://www.facebook.com/AAESZombie' . "\r\n" . 
'- l\'événement facebook https://www.facebook.com/events/1010356792413111' . "\r\n" . "\r\n" .
'Récapitulatif de vote inscription :' . "\r\n" .
'Nom : '.$result['name'] . "\r\n" .
'Prénom : '.$result['firstname'] . "\r\n" .
'Téléphone : '.$result['phone'] . "\r\n" .
'Menu : '.$result['menu_name'] .' - ' .$result['menu_recipe'] ."\r\n" .
'Renseignements : '.$result['information'] . "\r\n" . "\r\n" . 
'Prix : '.$price .'€'."\r\n" . 
'Détail : '."\r\n" .
$optionsString . "\r\n" .
'Pour corriger ces informations, merci de répondre à ce mail.' . "\r\n" .
'Le paiement de votre inscription s\'effectuera sur place.' . "\r\n" . "\r\n" .
'Merci d\'apporter la somme requise en espèce.' . "\r\n" . "\r\n" .
'Merci de votre participation !' . "\r\n" . "\r\n" .
'L\'équipe de l\'AAES.' . "\r\n";

$headers = 'From: asso.aaes@gmail.com' . "\r\n" .
'Reply-To: asso.aaes@gmail.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

/*$mail = mail ($email, $subject , $message ,$headers, '-f asso.aaes@gmail.com');
if(!$mail) {echo "error";}*/
} else {
$form ='<ul><li>Votre inscription n\'a pas fonctionné, vérifiez que le formulaire est correctement rempli.</li></ul>'.$form;
}

}
}
echo $form;

?>
-->

</div>
</div>

</div>
</div>


<?php require "footer.php"; ?>

