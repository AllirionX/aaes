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

<h1>CHOISISSEZ VOTRE EVENEMENT</h1>

<div class="events">

	<div class="evenement">
		<a href="interludes.php">
			<img src="images/interludes.png"/>
			<div class="eventhover">
				<div class="description">
					<ul>
						<li>DATE : 16 JUIN, 21H30</li>
						<li>PRIX : 5€</li>
						<li>#PLACES : 110</li>
						<li>LIEU : Festival Interludes de Cormelles-le-Royal</li>
					</ul>
				</div>
				<div class="name"><span>INTERLUDES <br>ZOMBIE SURVIVAL</span></div>
			</div>
		</a>
	</div>
	<div class="evenement">
		<a href="ZSN.php">
			<img src="images/ZSN.png"/>
			<div class="eventhover">
				<div class="description">
					<ul>
						<li>DATE : 30 JUIN, 21H00</li>
						<li>PRIX : 5€</li>
						<li>#PLACES : 150</li>
						<li>LIEU : Bois du Biez, Mondeville</li>
					</ul>
				</div>
				<div class="name"><span>Z SURVIVAL NIGHT</span></div>
			</div>
		</a>
	</div>
	<div class="evenement">
		<img src="images/surprise.png"/>
		<div class="eventhover">
			<div class="description">
				<ul>
					<li>DATE : INCONNU</li>
					<li>PRIX : INCONNU</li>
					<li>#PLACES : INCONNU</li>
					<li>LIEU : INCONNU</li>
				</ul>
			</div>
			<div class="name"><span>?</span></div>
		</div>
	</div>
</div>

<div class="texte">
<p>Avant toute inscription, pensez à lire les <a href="rule.php"><span class="red">règles</span></a> !</p>
</div>
</div>
</div>


<?php require "footer.php"; ?>

