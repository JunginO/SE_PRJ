<?php
	include_once "./layout.inc";
	$base = new layout;

	session_start();
	$id = $_SESSION['id'];

	$db_conn = mysqli_connect('localhost', 'bitnami', '1234', 'Destination') or die('fail');
	$sql = "SELECT * FROM desInfo WHERE id = '$id';";
	$query_res = mysqli_query($db_conn, $sql);

	$base->style = "
		.arrivalInfo{
			border: 1px solid #b0b0b0;
			width: 100%;
			height: 200px;
			padding: 5px;
		}

		#submit{
			margin-top: 25px;
			width: 100%;
			font-size: 13pt;
		}
	";

?>
<!DOCTYPE html>
<html>
<head>
	<?php
		$base->LayoutStyle();
	?>
</head>
<body>
	<?php 
		$base->LayoutHeader();
		$base->LayoutMenu();
	?>
	<article>
		<?php
			while($des_row = mysqli_fetch_array($query_res)){
				echo "<table class='arrivalInfo'><tr><td>";

				if($des_row['defaultDes'] == 1) echo "<p style='color: gray; font-size: 10pt;'>*기본배송지</p>";

				echo "이름: ".$des_row['name']."<br>".
					"배송지 주소: ".$des_row['address']." ".$des_row['detailAddr']."<br>".
					"우편번호: ".$des_row['postcode']."<br>".
					"연락처: ".$des_row['phoneNum']."<br><br>".

					"<form method='POST' action='postcodeAPIAmend.php' style='float:left;'>
					<input type='hidden' name='editRow' value='".$des_row['NUM']."'>
					<input type='submit' value='수정'></form>".

					"<form method='POST' action='deleteDest.php'>&nbsp;
					<input type='hidden' name='rmRow' value='".$des_row['NUM']."'>
					<input type='submit' value='삭제'></form></td>";

				echo "</tr></table>";
			}
		?>
		<input id="submit" type="button" value="+배송지 추가" onclick = "window.open('postcodeAPI.php')">
	</article>
	<?php
		$base->LayoutFooter();
	?>
</body>
</html>
