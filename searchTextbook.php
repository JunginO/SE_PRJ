<?php

 $base -> style = table { border-style: solid; border-width: medium;  border-radius: 5em; padding: 0.3em 1.5em; background: rgb(249, 249, 249); margin-left: 5px; border-color: rgb(51, 175, 233);}
 
 $base -> style = select{ width: 100px; padding: 0.4em 0.3em; border: none; font-family: inherit;}

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<style>
		input:focus {outline-color: rgb(51, 175, 233)}
	</style>
</head>
</html>


 public function searchbox()
 {
 	echo "<form method = "get" action="/save.php">
	<table id = 'search_box'>
		<th>
			<select id = 'category'>
				<option>통합검색</option>
				<option>국내도서</option>
				<option>국외도서</option>
				<option>중고도서</option>
			</select>
		</th>
		<th>
			<input type='text' name='book_name' style='width:20em; height: 2em; border: none;'>
		</th>
		<th>
			<input type="submit" value="검색">
		</th>
	</table>
	</form>";  /*<input type="submit" value="검색">에 class="" 버튼이미지 넣기 */
 }

?>