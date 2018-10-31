<?php require "header.php";
echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="gallery/resources/UberGallery.css" />
<link rel="stylesheet" type="text/css" href="gallery/resources/colorbox/1/colorbox.css" />



<script type="text/javascript" src="gallery/resources/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("a[rel=\'colorbox\']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
});
</script>';
require "menu.php"; 
if(isset ($_GET["year"])) {
$year = $_GET["year"];
} else {
$year = date("Y")-1;
}
?>

<div id="container">

<div id = "content">


<ul class="pager">
<?php for($i=2014;$i>2011;$i-- ){
 if($year==$i){
$selected = "selected";
} else {
$selected= "";
}
?>

<li><a class="<?php echo $selected; ?>" href="gallery.php?year=<?php echo $i;?>"><?php echo $i; ?></a></h1></li>
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
<?php if($year ==2014) {?>
<iframe class="video" width="320" height="180" src="//www.youtube.com/embed/y43ut7xwpfM" frameborder="0" allowfullscreen></iframe>
<?php } else {?>
<p>No videos found.</p>
<?php } ?>
</div>


<div class="texte">
<hr>
<h2>Photos</h2>

<?php include_once('gallery/resources/UberGallery.php'); 

$gallery = UberGallery::init("?year=".$year)->createGallery('gallery/images/'.$year); 
?>
</div>

</div>
</div>





<?php require "footer.php"; ?>



