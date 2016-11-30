<?php
require_once __DIR__ . '/func.php';
require_unlogined_session();
$conn = pg_connect("dbname=db_3836 user=d33836 host=192.168.109.210");


$result2 = pg_query("select * from tbl_data where bango ='".$bango."'");

?>
<html>
<head>
<title>test201.php</title>
<link rel="stylesheet" type="text/css" href="./assets/generalstyle.css">
<link rel="stylesheet" type="text/css" href="./assets/button.css">

</head>
<body>
<h1>基本情報</h1>
<h2></h2>
<hr />
<section>
<form method="post" action="general.php">

<!--------------------------------------------------------------------
							Form
--------------------------------------------------------------------->
<table class="general" align="center">

<tr>
<th class="hgeneral">性別</th> 
<td>
<input type="radio" id="male" name="frmGender" value="男">
	<label for="male">男性</label>
<input type="radio" id="female" name="frmGender" value="女">
	<label for="female">女性</label><br>
<input type="radio" name="frmGender" value="男" checked="checked" style="display:none;" />
</td>
</tr>

<tr>
<th class="hgeneral">血液型</th>
<td><label class="select-group">
<select name="frmBlood">
	<option value="">--
	<option value="A">A
	<option value="B">B
	<option value="O">O
	<option value="AB">AB
</select></label>型
</td>
</tr>
<tr>
<th class="hgeneral">誕生日</th>
<td>
<label class="select-group">
<select name="frmMonth">
	<option value="">--
	<?php
		for($i=1;$i<=12;$i++){
			print("<option value=".$i.">".$i);
		}
		print("</select></label>月");

		print("<label class='select-group'><select name='frmDay'>");
		print("<option value=''>--");
		for($j=1;$j<=31;$j++){
			print("<option value=".$j.">".$j);
		}
	?>
</select></label>日<td></tr>
</table>
<br />


<button type="submit" class="btn btn-green btn-fill-horz-o">編集完了</button></form>
<button class="btn btn-green btn-fill-horz-o" onclick="location.href='./home.php'">HOMEへ</button>
<button class="btn btn-green btn-fill-horz-o" onclick="location.href='./q1.php'">質問へ</button>


</section>


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


if(isset($_POST["frmMonth"]) == false || isset($_POST["frmDay"]) == false || isset($_POST["frmBlood"]) == false){

	print("何も入力されていません。");

}else{

	if(!$_POST["frmMonth"] || !$_POST["frmDay"] || !$_POST["frmBlood"]){
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
		
		if($selDay < 10)	$selDay = "0" . $selDay;

		$selBir = $selMon.$selDay;
		$result = pg_query("select * from tbl_data where bango ='".$bango."'");
		if(pg_numRows($result) != 0)		fncUp($bango,$selGen,$selBld,$selBir,$seiza);
		else if(pg_numRows($result) == 0)	fncIn($bango,$selGen,$selBld,$selBir,$seiza);

	}
}


pg_close($conn);

?>

</body>

</html>