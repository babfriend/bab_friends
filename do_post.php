<?php
if((!$_POST["title"]) || (!$_POST["content"])){
	header("location: addpost.html");
	exit;
}

$mysqli = mysqli_connect("localhost", "root", "apmsetup","bab_friends");
$addpost_sql = "INSERT INTO `post` (`title`, `post_time`, `location`, `content`, `menu`) VALUES (' ".$_POST["title"]." ', now( ),  '".$_POST["location"]."', '".$_POST["content"]."', '".$_POST["menu"]."')";

$addpost_res = mysqli_query($mysqli, $addpost_sql) or 
die (mysqli_error($mysqli));

$post_id = mysqli_insert_id($mysqli);
mysqli_close($mysqli);

$display_block = "<P>The <strong>".$_POST["title"]."</strong> post has been created.</p>";
?>
<?php 
echo("test");
?>