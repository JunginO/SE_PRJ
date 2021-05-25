<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>책정보 수정</title>
			<style> 
				th {border-top: 3px solid rgb(51, 175, 233); border-bottom:  1.5px solid rgb(160, 160, 160); padding: 3px;}
			</style>
		</head>	
		<body>
			<form name = "rewrite_book" method="post" enctype="multipart/form-data" action = "book_list_rewrite.php">
			<table>
				<th>상품번호</th>
				<th>국내/국외/중고</th>
				<th>10진분류</th>
				<th>책이름</th>
				<th>책상세정보</th>
				<th>저자</th>
				<th>가격</th>
				<th>책이미지</th>
				<th>등록</th>
				<tr>
					<?php
						error_reporting(E_ALL);
						ini_set( "display_errors", 1 );
						$conn =mysqli_connect('localhost','bitnami','1234','book') or die('connection fail');
						$edit_book = $_POST['edit_book'];
					?>
					<td>
						<input type ="hidden" name = "rewrite_book_num" value = "<?php echo $edit_book;?>">
						<?php echo $edit_book; ?></td>
					<td>
						<select name ="category" size ='1' style = "width : 100px; height: 30px">
							<option value = "korea">국내</option>
							<option value = "foreign">국외</option>
							<option value = "used">중고</option>
						</select>
					</td>
					<td>
						<select name ="cate_dec" style = "height: 29px">
							<option value = 0> 000 총류</option>
							<option value = 1> 100 철학</option>
							<option value = 2> 200 종교</option>
							<option value = 3> 300 사회과학</option>
							<option value = 4> 400 자연과학</option>
							<option value = 5> 500 기술과학</option>
							<option value = 6> 600 예술</option>
							<option value = 7> 700 언어</option>
							<option value = 8> 800 문학</option>
							<option value = 9> 900 역사</option>
						</select>	
					</td>
					<td><input type="text" name="book_name"></td>
					<td><input type="text" name="book_detail"></td>
					<td><input type="text" name="author" style = " width : 80px;"></td>
					<td><input type="number" name="price" min ="0" max = "1000000" style = " width : 70px;"></td>
					<td><input type="file" name = "book_image"></td>
					<td><input type ="submit" value="등록"></td>
				</tr>
			</table>
		</form>