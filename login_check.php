<?php
$db_host = "localhost"; 
$db_user = "root"; 
$db_passwd = "apmsetup";
$db_name = "babfriends"; 
$uid = $_POST["user_id"];
$upw = $_POST["user_pw"];

$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
if (mysqli_connect_errno($conn)) 
	{
		echo "데이터베이스 연결 실패: " . mysqli_connect_error();
	} 
else //DB연결됨
	{
		$query = "SELECT * FROM users WHERE id='$uid' AND pw='$upw';";
		$result= $conn->query($query);
		$row = mysqli_fetch_array($result);
		if(isset($row['id']) AND $row['id'] != NULL)
		{
			//echo $content;
			echo $uid;
			echo $upw;
			echo "성공";
			//session open
?>
	<script>
		window.location.href="bab_list.html";
	</script>
<?php
		}
		else
		{
			$warning="아이디 혹은 패스워드를 확인해주세요";
			$warning=iconv("utf8","euckr",$warning);
?>
	<script>
		alert($warning);
		window.history.back();
	</script>

<?php
		}
	}
?>
