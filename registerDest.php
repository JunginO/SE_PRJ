<?php
	session_start();

	$name = $_POST['name'];
	$postcode = $_POST['postcode'];
	$address = $_POST['address'];
	$detailAddress = $_POST['detailAddress'];
	$extraAddress = $_POST['extraAddress'];
	$phoneNum = $_POST['phoneNum'];
	$id = $_SESSION['id'];

	$num = preg_match('/^(010)[0-9]{4}[0-9]{4}/', $phoneNum);
	if(!$name || !$postcode || !$address || !$detailAddress || !$extraAddress || !$phoneNum){
		echo "<script>
			alert('입력되지 않은 정보가 존재합니다.');
			history.back();
			exit();
		</script>";
	}
	else if(strlen($phoneNum) != 11 || !$num){
		echo "<script>
			alert('연락처 형식에 맞지 않습니다.');
			history.back();
			exit();
		</script>";
	}
	else{
		$db_conn = mysqli_connect('localhost', 'bitnami', '1234', 'Destination') or die('fail');
		$sql = "INSERT INTO desInfo(name, postcode, address, detailAddr, extraAddr, phoneNum, id, defaultDes) VALUES('$name', '$postcode', '$address', '$detailAddress', '$extraAddress','$phoneNum', '$id', 0);";
		$query_res = mysqli_query($db_conn, $sql);

		if($query_res){
			echo "<script>
				alert('정상적으로 등록되었습니다.');
				location.href='myPageDest.php';
				exit();
			</script>";
		}
		else{
			echo "<script>
				alert('배송지 정보 등록에 실패했습니다.');
				history.back();
				exit();
			</script>";
		}
	}
?>