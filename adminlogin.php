<!DOCTYPE html>
<html>

<head>
<title>admin_login</title>

<style type="text/css">
.topline{border-top:2px solid black;
}
.botline{border-bottom:2px solid black;
}
.bottonline{border-top:2px solid black;
	border-bottom:2px solid black;
}
a:visited {text-decoration: none; color: #333333;
}

</style>

</head>

<body>

<h1> <p align=center>관리자 로그인</p> </h1>
<form method='post' action='adminlogincheck.php'>
	<table align=center border=0 cellspacing=0 width=500 bordercolordark=white bordercolorlight=#999999>
		<tr>
			<td class="topline" width=150>
				<p align=center>아이디</p>
			</td>
			<td class="topline" width=200>
				<input type="text" name="id" style="height:25px">
			</td>

			<td class="buttonline" rowspan="2" align=center>
				<button type="submit" style="height:100px; width:130px">로그인</button>
				</td>
			</tr>

			<tr>
				<td class="botline" width=150>
					<p align=center>비밀번호</p>
				</td>

				<td class="botline" width=200>
					<input type="password" name="pw" style="height:25px">
				</td>

			</tr>

			</table>
		</form>

	</body>

	</html>