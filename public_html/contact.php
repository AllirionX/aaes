<?php require "header.php";
require "functions.php";
require "menu.php"; ?>

<div id="container">

<div id = "content">

<div id ="title">
<h1>Soutien</h1>
<h2>Même un like est un grand geste !</h2>
</div>



<div class="texte">
<h2>Suivez-nous</h2>
<ul>
<li>Suivez-nous et tenez-vous au courant, pour des événements encore plus démentiels !</li>
<li><span class="red">AAES Zombie</span> sur facebook <a href="https://www.facebook.com/AAESZombie"> <img height="24" alt="Notre page facebook" src="images/icones/facebook64.png"/></a></li>
<li>Ou sur youtube <a href="https://www.youtube.com/channel/UCsMczR9mknFsfu005rWBSIg"><img height="24" alt="Notre chaîne youtube" src="images/icones/youtube64.png"/></a></li>
</ul>
<span class="red"></span>
<h2>Dons et Goodies</h2>
<ul>
<li>L'AAES est une association à but non lucratif. Vous pouvez nous aider à <span class="red">grandir</span>.</li>
<li>Visitez notre <span class="red">boutique</span> <a href="http://www.comboutique.com/aaes"><img height="24" alt="La boutique de l'AAES" src="images/icones/boutique.png"/></a> </li>
<li>A chaque achat, entre <span class="red">2€</span> et <span class="red">5€</span> sont reversés à l'AAES.</li> 
<li>Nous acceptons les dons :</li>
</ul>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick"/>
<input type="hidden" name="hosted_button_id" value="DPG4SQ3N62TBU"/>
<input type="image" style="border:0px;" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !"/>
<img alt="" style="border:0px" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1"/>
</form>

<h2>Coordonnées de l'AAES</h2>
<ul>
<li>Mail : <span class="reddark">asso.aaes@gmail.com</span></li>
<li>Téléphone : <br/>
Lilian (Respo Informatique) - <span class="reddark">06 73 55 65 43</span><br/>
Axel (Respo Juridique) - <span class="reddark">06 51 90 39 55</span><br/>
Yohann (Respo Logistique) - <span class="reddark">06 74 30 36 78</span></li>
<li>Courrier : <br/>
Siège social de l’AAES<br/>
151 rue Caponière<br/>
14000 Caen, France</li>
</ul>

<h2 id="contact" >Contact</h2>


<?php
$form = '<form action="contact.php" class="formulaire" method="post">
<table>
<tr><td><label><span class="red">*</span> Nom et prénom </label> </td><td><input type="text" name="name"/></td></tr>
<tr><td><label><span class="red">*</span> Mail </label></td><td><input type="text" name="mail"/></td></tr>
<tr><td><label><span class="red">*</span> Message </label></td><td><textarea name="message"></textarea></td></tr>

<tr>
<td></td><td>
<input type="submit" value="Envoyer"/>
<input type="hidden" name="envoi" value="ok"/>
</td>
</tr>
</table>
</form>';
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'asso.aaes@gmail.com';
 
// copie ? (envoie une copie au visiteur)
$copie = 'oui'; // 'oui' ou 'non'
 
// Messages de confirmation du mail
$message_envoye = "Message envoyé.";
$message_non_envoye = "L'envoi du message a échoué, veuillez réessayer.";
 
// Messages d'erreur du formulaire
$message_erreur_formulaire = "Vous devez d'abord envoyer le formulaire.";
$message_formulaire_invalide = "Veuillez vérifiez que tous les champs sont bien remplis et que l'email soit sans erreur.";
 
/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/
 
// on teste si le formulaire a été soumis
if (!isset($_POST['envoi']))
{
	// formulaire non envoyé
}
else
{
	
	
 
	// formulaire envoyé, on récupère tous les champs.
	$nom     = (isset($_POST['name']))     ? Rec($_POST['name'])     : '';
	$email   = (isset($_POST['mail']))   ? Rec($_POST['mail'])   : '';
	$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
 
	// On va vérifier les variables et l'email ...
	$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
 
	if (($nom != '') && ($email != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
					'Reply-To:'.$email. "\r\n" .
					'X-Mailer:PHP/'.phpversion();
 
		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.','.$email;
		}
		else
		{
			$cible = $destinataire;
		};
 
		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('<br>','',$message);
		$message = str_replace('<br />','',$message);
		$message = str_replace("&lt;","<",$message);
		$message = str_replace("&gt;",">",$message);
		$message = str_replace("&amp;","&",$message);
 
		// Envoi du mail
		if (mail($cible, $objet, $message, $headers))
		{
			$info =  '<div class="information">'.$message_envoye.'</div>';
		}
		else
		{
			$info = '<div class="information reddark">'.$message_non_envoye.'</div>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		$info = '<div class="information red">'.$message_formulaire_invalide.'</div>';
	};
	echo $info;
}; // fin du if (!isset($_POST['envoi']))

echo $form;
?>




</div>
</div>

</div>
<?php require "footer.php"; ?>



