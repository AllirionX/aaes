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

<h1>INTERLUDES ZOMBIE SURVIVAL</h1>



<div class="texte">
<p>Les Interludes, c'est une journée entière de jeux à Cormelles-le-Royal. En cloture, l'AAES organise un ZOMBIE SURVIVAL !</p>
<div class="inscription">
<p><ul><li><span class="red">DATE</span> : 16 JUIN, 21H30</li>
<li><span class="red">PRIX</span> : 5€</li>
<li><span class="red">LIEU</span> : Salle du Parc, 2 rue du Calvaire, 14123 Cormelles-le-Royal</li>
<li><span class="red">NOMBRE DE PARTICIPANTS</span> : 80 places sont réservables en ligne, 30 places seront vendues sur place le jour-même.</li>
<li><span class="red">REPAS</span> : vous pouvez manger sur place pour 5€, pensez à venir en avance (19H30) !</li>
<li>Une <span class="red">carte d'identité</span> vous sera demandée à l'entrée de la soirée.</li></ul></p>
<p>Suivez toute l'actualité d'Interludes sur l'<a href="https://www.facebook.com/events/592386417769984/">événement du festival<img height="24" alt="Notre page facebook" src="images/icones/facebook64.png"/></a>, ou sur notre page <a href="https://www.facebook.com/AAESZombie"><span class="red">AAES Zombie</span>  <img height="24" alt="Notre page facebook" src="images/icones/facebook64.png"/></a>.</p>
</div>
<div class="sidebar">
	<img src="images/interludes.png"/>
</div>

<p><span class="red">Important :</span> Les mineurs de moins de 16 ans ne sont pas admis. Les 16-18 ans doivent obligatoirement fournir lors de l'inscription l'autorisation parentale suivante remplie et signée : <a href="docs/Autorisation_Parentale_Zombie_Survival_Interludes_2018.pdf">Autorisation parentale</a></p>
</div>
<iframe id="haWidget" allowtransparency="true" src="https://www.helloasso.com/associations/amicale-des-amateurs-d-excursions-scenarisees-aaes/evenements/z-survival-night-interludes/widget" style="width:100%;height:1000px;border:none;" onload="window.scroll(0, this.offsetTop)"></iframe><div style="width:100%;text-align:center;">Propulsé par <a href="https://www.helloasso.com/" rel="nofollow">HelloAsso</a></div>





</div>
</div>


<?php require "footer.php"; ?>

