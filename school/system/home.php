<?php
require_once __DIR__ . '/func.php';
require_unlogined_session();
$conn = pg_connect("dbname=db_3836 user=d33836 host=192.168.109.210");
$bango = $_SESSION['id'];


$result1 = pg_query("select * from tbl_q1 where bango ='".$bango."'");
$result2 = pg_query("select * from tbl_q2 where bango ='".$bango."'");
$result3 = pg_query("select * from tbl_q3 where bango ='".$bango."'");
$q1 = "回答済";
$q2 = "回答済";
$q3 = "回答済";

if(pg_numRows($result1) == 0)	$q1 = "未回答";
if(pg_numRows($result2) == 0)	$q2 = "未回答";
if(pg_numRows($result3) == 0)	$q3 = "未回答";


?>
<html>
<head>
<title>test201.php</title>


<html>
<head>
<title>test201.php</title>
<link rel="stylesheet" type="text/css" href="./assets/homestyle.css">
<link rel="stylesheet" type="text/css" href="./assets/button.css">

</head>
<body>
<h1>登録</h1>
<hr />
<p align="center">ユーザー : <?php print($bango); ?></p>
<section>
<h2>性別や誕生日などの情報を編集する</h2>
<button class="btn btn-orange btn-fill-vert-o" onclick="location.href='./general.php'">編集する</button>


<h2>アンケートに答える</h2>
<table align="center">
<tr>
<th>音楽系統のアンケート( <?php print($q1); ?> )</th>
<th>系統のアンケート( <?php print($q2); ?> )</th>
<th>系統のアンケート( <?php print($q3); ?> )</th>
</tr>
<tr>
<td><button class="btn btn-orange btn-fill-vert-o" onclick="location.href='./q1.php'">アンケート1</button></td>
<td><button class="btn btn-orange btn-fill-vert-o" onclick="location.href='./q2.php'">アンケート2</button></td>
<td><button class="btn btn-orange btn-fill-vert-o" onclick="location.href='./q3.php'">アンケート3</button></td>
</tr>
</table>


<h2>アンケート結果</h2>
<button class="btn btn-orange btn-fill-vert-o" onclick="location.href='./result.php'">結果を見る</button>


</section>

<!--------------------------------------------------------------------
							PHP
--------------------------------------------------------------------->
<?php

function fncNseiki($funNum){
	if (!preg_match("/(?<!\d)\d{1,2}(?!\d)/",$funNum)) {
		$funNum = 0;
	}
	return $funNum;
}



/*------------------------------------------------
               テキストボックス
------------------------------------------------*/
$strMoji1 = "<";
$strMoji2 = "&lt;";
$strMoji3 = ">";
$strMoji4 = "&gt;";
	
if(isset($_POST["frmName"]) && $_POST["frmName"]){

	$se = fncNseiki($_POST["frmName"]);
	if($se == 0){
		print("半角英数字で入力してください。");
		//fncErr();

	}else{
		$txtName = str_replace($strMoji1,$strMoji2,$se);
		$txtName = str_replace($strMoji3,$strMoji4,$txtName);
	
		print($txtName."<br />");
	
	
	
	
	
	
	/*----------------------------------------------------
							DB
	-----------------------------------------------------*/
		//DB接続
		if($conn){
			print("DB OK!<br />");
		}else{
			print("Not OK<br />");
		}
		
		
		$bango = "d338".$txtName;
		
		$result = pg_query("select * from tbl_namae where bango ='".$bango."'");
		if($result){
			print($bango."<br />sqlok<br />");
			header( "Location: general.php" ) ;
		}
		else		print("sqlno<br />");
	
	
	
	
		//SQLで取得した行と列
		$cntRows = pg_numRows($result);
		$cntFields = pg_numFields($result);
		//print($cntRows."<br>");
		//print($cntFields."<br>");
	
	
		pg_close($conn);

	}
	$_SESSION['id'] = $bango;
}


?>

</body>

</html>