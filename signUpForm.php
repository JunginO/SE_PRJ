<?php
	require_once './layout.inc';

	$base = new Layout;

	$base->link = './style.css';
	
	$base->content="
		<form action = 'registerUser.php' method = 'POST'>
			<table style='margin : 0 auto;'>
				<tr>
					<th colspan=2>회원가입</th>
				</tr>
				<tr>
					<td>이름</td>
					<td><input type = 'text' size = '16' name='name'></td>
				</tr>
				<tr>
					<td>아이디</td>
					<td><input type = 'text' size = '16' name = 'id'></td>
				</tr>
				<tr>
					<td>비밀번호</td>
					<td><input type = 'password' size = '16' name = 'pw'><br><font size = '1em' color = 'grey'>비밀번호는 8~30자이고, 영문, 숫자를 혼합해야 합니다.</font></td>
				</tr>
				<tr>
					<td>비밀번호 확인</td>
					<td><input type = 'password' size = '16' name = 'chkPw'></td>
				</tr>
				<tr>
					<td>이메일</td>
					<td><input type = 'text' size = '16' name = 'email'></td>
				</tr>
				<tr>
					<td colspan = 2 style = 'text-align : center;'><input type = 'submit' value = '회원 가입'></td>
				</tr>
			</table>
		</form>
	";

	$base->LayoutMain();
?>