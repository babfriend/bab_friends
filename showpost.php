<?php
$db_host = "localhost"; 
$db_user = "root"; 
$db_passwd = "brightstar1993";
$db_name = "bab_friends"; 

if(!isset($_GET["post_no"])) {
	header("Location: postlist.php");
	exit;
}

$mysqli =  mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
$verify_post_sql = "SELECT post_no,title,post_time,location,menu,content FROM post WHERE post_no = '".$_GET["post_no"]."'";
$verify_post_res = mysqli_query($mysqli, $verify_post_sql) or 
					die(mysqli_error($mysqli));
if (mysqli_num_rows($verify_post_res) < 1){
	$display_block = "<p><em>Invalid topic!<br/>
	Please <a href= \"postlist.php\">try again</a>.</em></p>";
} else {
	while ($post_info = mysqli_fetch_array($verify_post_res)){
		$post_no = ($post_info['post_no']);
		$title = stripslashes($post_info['title']);
		$post_time = ($post_info['post_time']);
		$location = stripslashes($post_info['location']);
		$menu = stripslashes($post_info['menu']);
		$content = nl2br(stripslashes($post_info['content']));
	
$display_block .= "
<tr>
<td width=\"100%\" valign=\"top\">".$title."<br/>
[".$post_time."]<br/>
".$location."<br/>
".$menu."<br/>
".$content."<br/><br/>
<a href=\"commentpost.php?post_no=".$post_no."\">
<strong>Comment</strong></a></td>
</tr>";
}

mysqli_free_result($verify_post_res);
mysqli_close($mysqli);

$display_block .= "</table>";
}
?>
<html>
<head>
<title>Post</title>
</head>
<body>
<h1>Post</h1>
<?php echo $display_block; ?>
</body>
</html>
