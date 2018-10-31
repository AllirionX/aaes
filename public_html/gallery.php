<?php require "header.php";
echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
echo '<script type="text/javascript" src="gallery/resources/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("a[data-rel=\'colorbox\']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
});
</script>';
require "menu.php"; 
if(isset ($_GET["year"])) {
$year = $_GET["year"];
} else {
$year = date("Y");
}
?>

<div id="container">

<div id = "content">


<ul class="pager">
<?php for($i=2017;$i>2011;$i-- ){
 if($year==$i){
$selected = "selected";
} else {
$selected= "";
}
?>

<li><a class="<?php echo $selected; ?>" href="gallery.php?year=<?php echo $i;?>"><?php echo $i; ?></a></li>
<?php
}
?>

</ul>
<div id ="title">
<!--<h1>Galerie photo</h1>-->
<h2>Galerie photo et vidéo des précédentes Soirées Zombies</h2>
</div>




<div class="texte">
<h2>Vidéos</h2>
<?php if($year ==2017) {?>
<p>Pas encore de vidéo.</p>
<?php } else if($year ==2016) {?>
<iframe width="320" height="180" src="https://www.youtube.com/embed/9QqPeRBXxis" style="border:0px" allowfullscreen></iframe>
<?php } else if($year ==2015) {?>
<iframe width="320" height="180" src="https://www.youtube.com/embed/ZAM7sSxOW0Q" style="border:0px" allowfullscreen></iframe>
<iframe width="320" height="180" src="//www.youtube.com/embed/w3LpikmFcm4" style="border:0px" allowfullscreen></iframe>
<iframe width="320" height="180" src="https://www.youtube.com/embed/7qe9H50xbVg" style="border:0px" allowfullscreen></iframe>
<?php } else if($year ==2014) {?>
<iframe class="video" width="320" height="180" src="//www.youtube.com/embed/y43ut7xwpfM" style="border:0px" allowfullscreen></iframe>
<?php } else {?>
<p>Pas encore de vidéo.</p>
<?php } ?>
</div>


<div class="texte">
<hr/>
<h2>Photos</h2>

<?php include_once('gallery/resources/UberGallery.php'); 

$gallery = UberGallery::init("?year=".$year)->createGallery('gallery/images/'.$year); 
?>
</div>

</div>
</div>





<?php require "footer.php"; ?>



