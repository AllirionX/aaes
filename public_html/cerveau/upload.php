<?php
    $repertoireDestination = "cerveau/";
    $nomDestination        = $_FILES["monfichier"]["name"];
    // Pour raison de s�curit� nous ajouterons aux fichiers
    // portant une extension .php .php3, l'extension .txt
    if (!preg_match("^.txt^", $nomDestination)) {
        echo ".txt attendu";
    } else {
    
    if (is_uploaded_file($_FILES["monfichier"]["tmp_name"])) {
		$date=date('d-m-Y--H-i-s');
        if (rename($_FILES["monfichier"]["tmp_name"],
                   $repertoireDestination.$date.$nomDestination)) {
            echo "Le fichier ".$nomDestination." a bien �t� upload�. Veuillez attendre quelques secondes.";
			echo '<meta http-equiv="Refresh" content="1;URL=cerveau/deck.php?deck='.$date.$nomDestination.'">';
        } else {
            echo "Le d�placement du fichier temporaire a �chou�".
                 " v�rifiez l'existence du r�pertoire ".$repertoireDestination;
       }          
    } else {
       echo "Le fichier n'a pas �t� upload� (trop gros ?)";
    }
	}
?>