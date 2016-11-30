<html>
<head>
<title>test201.php</title>
<link rel="stylesheet" type="text/css" href="../css/test_style.css">
<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../js/vgrid.js"></script>
<script type="text/javascript" src="../js/chart.min.js"></script>
<script type="text/javascript" src="../js/graph.js"></script>
<script>
$(function(){
	$("#grid-content").vgrid({
		easeing: "easeOutQuint",
		useLoadImageEvent: true,
		time: 400,
		delay: 20,
		fadeIn: { //フェードインの指定
			time: 500,
			delay: 200
		}
	});
});
</script>
<script>
$(document).ready(function() {
$('#tblDB').fadeIn(2000);
});
</script>

</head>
<body>
<article>
	<?php
	$atdnum = $_POST["frmAtdnum"];
	if($atdnum < 10){
		$atdnum = "0".$atdnum;
	}
	$name      = $_POST["frmName"];
	$gender    = $_POST["frmGender"];
	$brthMonth = $_POST["frmBirthMonth"];
	$brthDate  = $_POST["frmBirthDate"];
	$blood     = $_POST["frmBlood"];
	$tall      = $_POST["frmTall"];
	$q1       = $_POST["frmQ1"];
	$q2      = $_POST["frmQ2"];
	$q3   = $_POST["frmQ3"];
	if($atdnum==0)break;
	//DB接続
	require_once("connect.php");
		$exists = pg_query($conn,"select 出席番号 from tbl_data where 出席番号 ='d338$atdnum'");
		$exstRow = pg_numRows($exists);
		if($exstRow == 0){    //レコードがまだ無い場合
			$record = pg_query("insert into tbl_data values(
			'd338$atdnum',
			'$name',
			'$gender',
			'$brthMonth',
			'$brthDate',
			'$blood',
			'$tall',
			'$q1',
			'$q2',
			'$q3'
			);");
			print("<p align='center' style='color:blue'>レコードを追加しました</p>\n");
		}else{                //レコードが既にある場合
			$record = pg_query("update tbl_data set
			名前 = '$name',
			性別 = '$gender',
			誕生月 = $brthMonth,
			誕生日 = $brthDate,
			血液型 = '$blood',
			身長 = '$tall',
			q1 = '$q1',
			q2 = '$q2',
			q3 = '$q3'
			where 出席番号= 'd338$atdnum';
			");
			print("<p align='center' style='color:red;'>レコードを更新しました</p>\n");
		}
		print("<table id='tblA' style='width:1200px;margin:auto;'>");
		print("<tr><th colspan='7'>基本情報</th><th colspan='3'>質問回答</th></tr>");
		print("<tr>");
		print("<td>出席番号</td><td>名前</td><td>性別</td><td>誕生月</td><td>誕生日</td><td>血液型</td><td>身長</td><td>質問１</td><td>質問２</td><td>質問３</td>");
		print("</tr>\n<tr>");
		print("<td>".$atdnum."番</td>\n");
		print("<td>".$name."</td>\n");
		print("<td>".$gender."</td>\n");
		print("<td>".$brthMonth."月</td>\n");
		print("<td>".$brthDate."日</td>\n");
		print("<td>".$blood."型</td>\n");
		print("<td>".$tall."cm</td>\n");
		print("<td>".$q1."</td>\n");
		print("<td>".$q2."</td>\n");
		print("<td>".$q3."</td>\n");
		print("</tr>\n</table>");
	//SQL発行
	$result = pg_query("select * from tbl_data order by 出席番号 asc");
	//SQLで取得した行と列
	$cntRows = pg_numRows($result);
	$cntFields = pg_numFields($result);

	//テーブル出力
	print("<table id='tblDB'>\n");
	print("<tr>\n");
	for($k = 0;$k<$cntFields;$k++){
		print("<th>\n");
		print(pg_fieldname($result,$k));
		print("</th>\n");
	}
	for($i = 0;$i < $cntRows;$i++){
		print("<tr>");
		for($j =0;$j < $cntFields;$j++){
			print("<td>");
			print(pg_result($result,$i,$j));
			print("</td>");
		}
		print("</tr>");
	}
	print("</table>");
	require_once("data.php");
	pg_free_result($result);//テーブル切断
	pg_close($conn);//データベース切断
	?>
</article>
<div id="grid-content">
	<div class="graph"><canvas id="barPetGender" ></canvas></div>
	<div class="graph"><canvas id="lineTotalTall" ></canvas></div>
	<div class="graph"><canvas id="dntBlood" ></canvas></div>
	<div class="graph"><canvas id="barBirth" ></canvas></div>
</div>
<script>
var mDog = <?php echo $mDog; ?>;
var mCat = <?php echo $mCat; ?>;
var fDog = <?php echo $fDog; ?>;
var fCat = <?php echo $fCat; ?>;
var Abld = <?php echo $Ablood; ?>;
var Bbld = <?php echo $Bblood; ?>;
var Obld = <?php echo $Oblood; ?>;
var ABbld = <?php echo $ABblood; ?>;
barPetGender(mDog,mCat,fDog,fCat);
totalTall();
dntBlood(Abld,Bbld,Obld,ABbld);
barBirth();
</script>
</body>
</html>
