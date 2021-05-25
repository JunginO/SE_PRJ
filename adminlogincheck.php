<?php

$userid=$_POST['id'];
$userpw=$_POST['pw'];

if($userid==""||$userpw==""){
	echo '<script> alert("아이디 또는 비밀번호를 입력하세요."); history.back(); </script>';
} else{

	$mysqli=mysqli_connect('localhost','bitnami','1234','login');

	$jb_sql="SELECT * FROM adminlogin WHERE id='$userid' AND pw='$userpw'";
	$jb_result=mysqli_query($mysqli, $jb_sql);

	if($jb_row=mysqli_fetch_array($jb_result)){
		session_start(); //세션추가코드
        $_SESSION['id']=$userid;  //세션추가코드

		echo"<script>location.href='adminMainPage.php';</script>";
	}
	else{
		echo"<script>alert('아이디 또는 비밀번호를 잘못 입력하였습니다.');history.back();</script>";
		}
}
?>
