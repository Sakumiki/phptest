<?php
require_once __DIR__ . '/func.php';
require_unlogined_session();
$conn = pg_connect("dbname=db_3836 user=d33836 host=192.168.109.210");

?>
<html>
<head>
<title>test201.php</title>




<!-- BootstrapのCSS読み込み -->
<link rel="stylesheet" type="text/css" href="./assets/bootstrap.css">
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="./assets/saku.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!-- http://fortawesome.github.io/Font-Awesome/icons/ アイコン一覧 -->


<!-- jQuery読み込み -->
<script src="./assets/jquery-2.2.1.min.js"></script>

<!-- BootstrapのJS読み込み -->
<script src="./assets/bootstrap.min.js"></script>











</head>
<body>
<h1>登録</h1>
<h2></h2>
<hr />
<form method="post" action="general.php">


<!--------------------------------------------------------------------
							Form
--------------------------------------------------------------------->


性別 : 
<select name="frmGender">
	<option value="男">男性
	<option value="女">女性
</select>
<br /><br />
血液型 : 
<select name="frmBlood">
	<option value="A">A型
	<option value="B">B型
	<option value="O">O型
	<option value="AB">AB型
</select>
<br /><br />
誕生日
<select name="frmMonth">
	<option value="--">
<?php
for($i=1;$i<=12;$i++){
	print("<option value=".$i.">".$i);
}
print("</select>月");


print("<select name='frmDay'>");

for($j=1;$j<=31;$j++){
	print("<option value=".$j.">".$j);
}
?></select>日

<br /><br />

<input type="submit" value="SEND">
<input type="reset" value="Clear">

</form>
<a href="./chats.html" class="btn btn-info btn-lg">HOMEへ</a>


<!--------------------------------------------------------------------
							PHP
--------------------------------------------------------------------->
<?php
$bango = $_SESSION['id'];
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



function fncSeiza($mo,$da){
	$seizaa = array("おひつじ","おうし","ふたご","かに","しし","おとめ","てんびん","さそり","いて","やぎ","みずがめ","うお");

	switch($mo){
		case 1:
			$se = $seizaa[9];
			if($da >= 20)	$se = $seizaa[10];
			break;
		case 2:
			$se = $seizaa[10];
			if($da >= 19)	$se = $seizaa[11];
			break;
		case 3:
			$se = $seizaa[11];
			if($da >= 21)	$se = $seizaa[0];
			break;
		case 4:
			$se = $seizaa[0];
			if($da >= 20)	$se = $seizaa[1];
			break;
		case 5:
			$se = $seizaa[1];
			if($da >= 21)	$se = $seizaa[2];
			break;
		case 6:
			$se = $seizaa[2];
			if($da >= 22)	$se = $seizaa[3];
			break;
		case 7:
			$se = $seizaa[3];
			if($da >= 23)	$se = $seizaa[4];
			break;
		case 8:
			$se = $seizaa[4];
			if($da >= 23)	$se = $seizaa[5];
			break;
		case 9:
			$se = $seizaa[5];
			if($da >= 23)	$se = $seizaa[6];
			break;
		case 10:
			$se = $seizaa[6];
			if($da >= 24)	$se = $seizaa[7];
			break;
		case 11:
			$se = $seizaa[7];
			if($da >= 23)	$se = $seizaa[8];
			break;
		case 12:
			$se = $seizaa[8];
			if($da >= 22)	$se = $seizaa[9];
			break;
	}
	return $se;
}


function fncMseiki($funNum){
	if (!preg_match("/^[2|4|6|9|11]+$/",$funNum)) {
		$funNum = true;
	}
	return $funNum;
}


if((isset($_POST["frmGender"]) == false && isset($_POST["frmBlood"]) == false && isset($_POST["frmMonth"]) == false && isset($_POST["frmDay"]) == false)){

	print("何も入力されていません。");

}else{

	if($_POST["frmGender"] == null && $_POST["frmBlood"] == null && $_POST["frmMonth"] == null && $_POST["frmDay"] == null){
		print("何も入力されていません。");
	}else{


	/*----------------------------------------------------------------------------------------------
	    	           ラジオボタン
		------------------------------------------------
		if(isset($_POST["frmSeibetu"]) == false || $_POST["frmSeibetu"] == null){

			print("性別が選択されていません"."<br />");

		}else{

			$redSeibetu = $_POST["frmSeibetu"];
			print($redSeibetu."<br />");

		}

		/*------------------------------------------------
	    	           チェックボックス
		------------------------------------------------
		if(isset($_POST["frmTabemono"]) == false || $_POST["frmTabemono"] == null){

			print("好きな食べ物が選択されていません<br />");

		}else{

			$chkTabemono = $_POST["frmTabemono"];
			print($chkTabemono."<br />");

		}
	----------------------------------------------------------------------------------------------*/






		/*------------------------------------------------
		               リストボックス
		------------------------------------------------*/
		if(isset($_POST["frmGender"])|| $_POST["frmGender"]){

			$selGen = $_POST["frmGender"];
			print($selGen."<br />");

		}
		if(isset($_POST["frmBlood"])|| $_POST["frmBlood"]){

			$selBld = $_POST["frmBlood"];
			print($selBld."<br />");

		}
		if(isset($_POST["frmMonth"])|| $_POST["frmMonth"]){

			$selMon = $_POST["frmMonth"];
			print($selMon."/");

		}
		if(isset($_POST["frmDay"])|| $_POST["frmDay"]){
			$mon = fncMseiki($selMon);
			$selDay = $_POST["frmDay"];
			if($mon&&$selDay==31){
				print("<br />");
			}else{
				print($selDay."<br />");
			}
			$seiza = fncSeiza($selMon,$selDay);
			print($seiza);
		}
		$selBir = $selMon.$selDay;

		$result = pg_query("select * from tbl_data where bango ='".$bango."'");
		if($result)	fncIn($bango,$selGen,$selBld,$selBir,$seiza);
		else		fncUp($bango,$selGen,$selBld,$selBir,$seiza);

		

	}
}


pg_close($conn);

?>

</body>

</html>