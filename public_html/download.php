<?php 
require "connexion.php";
require "functions.php";
session_start();
if(session_id()!='') {
	$query = 'SELECT `id`,`inscription`.`name`,`inscription`.`firstname`,`inscription`.`mail`,`inscription`.`phone`,`inscription`.`information`,`inscription`.`car`,`inscription`.`doc`,`inscription`.`zombie`,`inscription`.`appetizing`,`inscription`.`year`,`menu`.`menu_name`,`menu`.`menu_recipe` FROM `inscription`,`menu` WHERE YEAR(year)=2016 AND `inscription`.`menu_id` = `menu`.`menu_id`'; 
	$result = $bdd->query($query);
	if (!$result) die('Couldn\'t fetch records');
	$num_fields = $result->columnCount();
	$headers = array();
	for ($i = 0; $i < $num_fields; $i++) {
		$columnMeta = $result->getColumnMeta($i);
		$headers[] = $columnMeta['name'];
	}
	$headers[] = "Options";
	$headers[] = "Price";
	
	$fp = fopen('php://output', 'w');
	if ($fp && $result) {
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="inscription_aaes_2016.csv"');
		header('Pragma: no-cache');
		header('Expires: 0');
		$delimiter = ';';
		fputcsv($fp, $headers, $delimiter);
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$arrayRow = $row;
			$queryOptionResult = 'SELECT * FROM `option`,`option_inscription` WHERE `option_inscription`.`inscription_id` = '.$row['id'].' AND `option_inscription`.`option_id` = `option`.`option_id`';
			$responseOptionResult = $bdd->query($queryOptionResult);
			
				$priceAndOpt = Options($responseOptionResult,"\n");
				$optionsString=$priceAndOpt['options'];
				$price = $priceAndOpt['price'];
				$arrayRow[] = $optionsString;
				$arrayRow[] = $price;
			
			
			fputcsv($fp, $arrayRow, $delimiter);
		}
		die;
	}

	
}



?>
