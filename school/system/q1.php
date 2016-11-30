<?php
require_once __DIR__ . '/func.php';
require_unlogined_session();
$conn = pg_connect("dbname=db_3836 user=d33836 host=192.168.109.210");
$bango = $_SESSION['id'];
?>
<html>
<head>
<title>test201.php</title>
<link rel="stylesheet" type="text/css" href="./assets/q1style.css">
<link rel="stylesheet" type="text/css" href="./assets/button.css">

</head>
<body>
<h1>登録</h1>
<h2></h2>
<hr />


<section>
<form method="post" action="q1.php">


<!--------------------------------------------------------------------
							Form
--------------------------------------------------------------------->
<table class="q1" align="center">

<tr>
<th>一番好きな音楽のジャンル</th>

<td><label class="select-group">
<select name="qMGenre">
	<option value="">--
	<option value="J-POP">J-POP(邦楽)全般
	<option value="洋楽">洋楽
	<option value="ロック">ロック
	<option value="クラシック">クラシック
	<option value="アニソン">アニソン
	<option value="EDM">EDM
</select>
</label></td>
</tr>

<tr>
<th>一番好きなグループ体系</th>
<td><label class="select-group">
<select name="qMSystem">
	<option value="">--
	<option value="女性アイドル">女性アイドルグループ
	<option value="男性アイドル">男性アイドルグループ
	<option value="シンガーソングライター">シンガーソングライター
	<option value="バンド">バンド
	<option value="その他">その他
</select>
</label></td>
</tr>
	
<tr>
<th>好きなアーティスト</th>
<td>
<p>1<input type="text" name="qMArtist1" value="" required>※必須</p>
<p>2<input type="text" name="qMArtist2" ></p>
<p>3<input type="text" name="qMArtist3"></p>
</td>
</tr>

</table>

<button class="btn btn-blue btn-fill-vert-o" onclick="location.href='./home.php'">HOMEへ</button>
<button type="submit" class="btn btn-blue btn-fill-vert-o">編集完了</button>

</form>
</section>

<!--------------------------------------------------------------------
							PHP
--------------------------------------------------------------------->
<?php
print($bango);

/*----------------------------------------------------
						DB
-----------------------------------------------------*/
//DB接続
if($conn){
	print("DB OK!<br />");
}else{
	print("Not OK<br />");
}


require_once("add.php");


function fncNseiki($funNum){
	if (!preg_match("'/(?<!\d)\d{1,5}(?!\d)/'",$funNum)) {
		$funNum = 0;
		print("入力された文字が数字ではありません<br />");
	}
	return $funNum;
}



function fncMseiki($funNum){
	if (!preg_match("/^[2|4|6|9|11]+$/",$funNum)) {
		$funNum = true;
	}
	return $funNum;
}


if((isset($_POST["qMGenre"]) == false || isset($_POST["qMSystem"]) == false || isset($_POST["qMArtist1"]) == false)){

	print("何も入力されていません。");

}else{

	if(!$_POST["qMGenre"] || !$_POST["qMSystem"] || !$_POST["qMArtist1"]){
		print("何も入力されていません。");
	}else{



		/*------------------------------------------------
		               リストボックス
		------------------------------------------------*/
		if(isset($_POST["qMGenre"])|| $_POST["qMGenre"]){

			$selGenr = $_POST["qMGenre"];
			print($selGenr."<br />");

		}
		if(isset($_POST["qMSystem"])|| $_POST["qMSystem"]){

			$selSys = $_POST["qMSystem"];
			print($selSys."<br />");

		}


		$art1 = filter_input(INPUT_POST, 'qMArtist1');
		$art2 = filter_input(INPUT_POST, 'qMArtist2');
		$art3 = filter_input(INPUT_POST, 'qMArtist3');


		$q = "q1";
		$result = pg_query("select * from tbl_q1 where bango ='".$bango."'");
		if(pg_numRows($result) != 0)		fncUpq($q,$bango,$selGenr,$selSys,$art1,$art2,$art3);
		else if(pg_numRows($result) == 0)	fncInq($q,$bango,$selGenr,$selSys,$art1,$art2,$art3);

		

	}
}


pg_close($conn);

?>

</body>

</html>