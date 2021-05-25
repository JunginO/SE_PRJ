<?php

 $base -> style = table {
			border-style: solid; border-width: medium;  border-radius: 5em; padding: 0.3em 1.5em; background: rgb(249, 249, 249); margin-left: 5px; border-color: rgb(51, 175, 233);
		}

		select{
			width: 100px; padding: .4em .3em;
			border: none;
			font-family: inherit;
		}

		input:focus {outline-color: rgb(51, 175, 233)}


 public function searchbox()
 {
 	echo "<form method = "get" action="/page/board/search_result.php">
	<table>
		<th>
			<select category>
				<option>통합검색</option>
				<option>국내도서</option>
				<option>국외도서</option>
				<option>중고도서</option>
			</select>
		</th>
		<th>
			<input type="text" name="book_name" style="width:20em; height: 2em; border: none;">
		</th>
		<th>
			<input type="submit" value="검색">
		</th>
	</table>
	</form>";  /*<input type="submit" value="검색">에 class="" 버튼이미지 넣기 */
 }

?>