<?php
    session_start();
    $id = $_SESSION['id'];
    $row_num = $_POST['editRow'];

    $db_conn = mysqli_connect('localhost', 'bitnami', '1234', 'Destination') or die('fail');
    $sql = "SELECT * FROM desInfo WHERE NUM = '$row_num';";
    $query_res = mysqli_query($db_conn, $sql);
    $db_row = mysqli_fetch_array($query_res);
?>

<!DOCTYPE html>
<html>
<head>
	<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>
    <form method="POST" action="amendDest.php">
        <input type="hidden" name="num" value="<?php echo $db_row['NUM']; ?>">
        <input type="text" placeholder="이름" name='name' value="<?php echo $db_row['name']; ?>"><br><br>
        <input type="text" id="postcode" placeholder="우편번호" name='postcode' value="<?php echo $db_row['postcode']; ?>"readonly>
        <input type="button" onclick="execDaumPostcode()" value="우편번호 찾기"><br>
        <input type="text" id="address" placeholder="주소" name='address' value="<?php echo $db_row['address']; ?>"readonly><br>
        <input type="text" id="detailAddress" placeholder="상세주소" name='detailAddress' value="<?php echo $db_row['detailAddr']; ?>">
        <input type="text" id="extraAddress" placeholder="참고항목" name='extraAddress' value="<?php echo $db_row['extraAddr']; ?>"readonly><br><br>
        <input type="text" placeholder="연락처(010********)" name='phoneNum' value="<?php echo $db_row['phoneNum']; ?>"><text style="color: gray; font-size: 9pt;">  * '-'을 제외하고, 숫자만 입력.</text><br><br>
        <input type="checkbox" name="isDefault" value=1><text style="color: black; font-size: 9pt;">기본배송지로 지정</text><br><br>
        <input type="submit" value = "수정"><text style="color: gray; font-size: 9pt;">  * 이름, 우편번호, 주소, 상세주소, 연락처는 필수항목</text>
    </form>
	<script>
    function execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("extraAddress").value = extraAddr;
                
                } else {
                    document.getElementById("extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('postcode').value = data.zonecode;
                document.getElementById("address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("detailAddress").focus();
            }
        }).open();
    }
    </script>
</body>
</html>