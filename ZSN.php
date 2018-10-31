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

<h1>Z SURVIVAL NIGHT</h1>



<div class="texte">
<p>La soirée mythique de l'AAES revient ! Attention, nombre de places limité.</p>
<div class="inscription">
<p><ul><li><span class="red">DATE</span> : 30 JUIN, 21H00</li>
<li><span class="red">PRIX</span> : 8€</li>
<li><span class="red">LIEU</span> : Bois du Biez, 6 rue Calmettes, 14120 Mondeville </li>
<li><span class="red">NOMBRE DE PARTICIPANTS</span> : 150</li>
<li><span class="red">REPAS</span> : le repas est compris dans votre billet !</li>
<li>Une <span class="red">carte d'identité</span> vous sera demandée à l'entrée de la soirée.</li></ul></p>
<p>Suivez toute l'actualité de Z SURVIVAL NIGHT sur l'<a href="https://www.facebook.com/events/592386417769984/">événement <img height="24" alt="Notre page facebook" src="images/icones/facebook64.png"/></a>.</p>
</div>
<div class="sidebar">
	<img src="images/ZSN.png"/>
</div>
<p><span class="red">Important :</span> Les mineurs de moins de 16 ans ne sont pas admis. Les 16-18 ans doivent obligatoirement fournir lors de l'inscription l'autorisation parentale suivante remplie et signée : <a href="docs/Autorisation_Parentale_Z_SURVIVAL_NIGHT_2018.pdf">Autorisation parentale</a></p>
</div>

<iframe id="haWidget" allowtransparency="true" src="https://www.helloasso.com/associations/amicale-des-amateurs-d-excursions-scenarisees-aaes/evenements/z-survival-night-30-juin-2018/widget" style="width:100%;height:1000px;border:none;" onload="window.scroll(0, this.offsetTop)"></iframe><div style="width:100%;text-align:center;">Propulsé par <a href="https://www.helloasso.com/" rel="nofollow">HelloAsso</a></div>



</div>
</div>


<?php require "footer.php"; ?>

