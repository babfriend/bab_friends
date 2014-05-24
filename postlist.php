<?php
$mysqli = mysqli_connect("localhost", "root", "brightstar1993","bab_friends");
$get_post_sql = "SELECT post_no, title, DATE_FORMAT(post_time, '%b %e %Y at %r') AS fmt_post_time FROM post ORDER BY post_time DESC";
$get_post_res = mysqli_query ($mysqli, $get_post_sql) or
die (mysqli_error($mysqli));

if (mysqli_num_rows($get_post_res) < 1 ) {
$display_block = "<p><em>No Post exist.</em></p>";
}
else {
$display_block = "<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\">
<tr>
<th>Post Title</th>
<th>No of Comments</th>
</tr>";

while ($post_info = mysqli_fetch_array($get_post_res)) {
	$post_no = $post_info['post_no'];
	$title = stripslashes ($post_info['title']);
	$post_time = $post_info['fmt_post_time'];
	// post owner

$get_num_com_sql = "SELECT COUNT(comment_no) AS comment_count FROM comment WHERE post_no = '".$post_no."'";
$get_num_com_res = mysqli_query($mysqli, $get_num_com_sql) or
die (mysqli_error($mysqli));

while ($com_info = mysqli_fetch_array($get_num_com_res)) {
	$num_com = $com_info['comment_count'];
}

$display_block .="
<tr>
<td><a href=\"showpost.php?post_no=".$post_no."\"><strong>".
$title."</strong></a><br/>
Created on ".$post_time." </td>
<td align=center>".$num_com."</td>
	</tr>";
}

mysqli_free_result($get_post_res);
mysqli_free_result($get_num_com_res);

mysqli_close($mysqli);

$display_block .="</table>";
}
?>
<html>
<head>
<title>Post List </title>
</head>
<body>
<h1>Post List</h1>
<?php echo $display_block; ?>
<p> <a href= "addpost.html"> Create a post</a>?</p>
</body>
</html>
