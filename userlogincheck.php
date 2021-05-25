<?php

$userid=$_POST['id'];
$userpw=$_POST['pw'];

if($userid==""||$userpw==""){
	echo '<script> alert("아이디 또는 비밀번호를 입력하세요"); history.back(); </script>';
} else{

	$mysqli=mysqli_connect('localhost','bitnami','1234','customerInfo');

	$id_sql = "SELECT * FROM member WHERE id = '$userid';"; //기존 db의 id 정보와 비교
    $id_sql_res = mysqli_query($mysqli, $id_sql);

    while ($id_db_row = mysqli_fetch_array($id_sql_res)){
    	$pw_dup = $id_db_row['pw'];
        $name = $id_db_row['name'];
        $permit = $id_db_row['permit'];
    }
    
    if(password_verify($userpw, $pw_dup)){
        if($permit==0){
        echo"<script>alert('아이디 또는 비밀번호를 잘못 입력하였습니다');history.back();</script>";
        } else{
        session_start(); //세션추가코드
        $_SESSION['id']=$userid;  //세션추가코드
        $_SESSION['name']=$name;  //세션추가코드
        echo"<script>location.href='mainPage.php';</script>";
    }
    } else{
    	echo"<script>alert('아이디 또는 비밀번호를 잘못 입력하였습니다');history.back();</script>";
    }

}

?>