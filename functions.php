<?php function Rec($text)
	{
		$text = htmlspecialchars(trim($text), ENT_QUOTES);
		if (1 === get_magic_quotes_gpc())
		{
			$text = stripslashes($text);
		}
 
		$text = nl2br($text);
		return $text;
	};

function IsEmail($email)
	{
		$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
		return (($value === 0) || ($value === false)) ? false : true;
	};
	
function IsPhone($phone)
{
$motif ='#^0[1-78]([-. ]?[0-9]{2}){4}$#';
$value = preg_match($motif,$phone);
return (($value === 0) || ($value === false)) ? false : true;
};

function Price($responseResult) {
	$price =5;
	reset($responseResult);
	foreach($responseResult as $row) {
		$price = $price + $row['option_price'];
	}
	return $price;
}

function Options($responseResult, $separator) {
	$result ='Participation (5€)'.$separator;
	$price =5;
	reset($responseResult);
	foreach($responseResult as $row) {
		$result=$result.$row['option_shortname'].' ('.$row['option_price'].'€)'.$separator;
		$price = $price + $row['option_price'];
	}
	return array("price"=>$price,"options" => $result);
}
?>
