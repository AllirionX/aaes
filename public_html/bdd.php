<?php require "header.php"; 
require "menu.php";?>
<div id="container">

<div id = "content">

<div id ="title"><h1>Administration</h1></div>
<div class="texte">
	<h2>Accéder à la liste des inscrits</h2>
		<form action="secret.php" method="post" class="formulaire">
		<table>
		<tr><td><label>Année</label></td><td><select name="year">
				
				<?php 
				$currentYear = intval(date('Y'),10);
				for($i=$currentYear;$i>2013;$i--) {?>
					<option value="<?php echo $i?>"><?php echo $i?></option>
				<?php
				}
				?>
			</select></td></tr>
			<tr><td><label>Mot de passe</label></td><td><input type="password" name="mot_de_passe" /></td></tr>
			<tr><td></td><td><input type="submit" value="Valider" /></td></tr>
		</table>
			
		</form>
</div>		
</div>
</div>
<?php require "footer.php"; ?>