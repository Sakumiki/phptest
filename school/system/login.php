<?php

require_once __DIR__ . '/func.php';
require_once("add.php");
require_unlogined_session();

$conn = pg_connect("dbname=db_3836 user=d33836 host=192.168.109.210");

// ユーザから受け取ったユーザ名
$bans = filter_input(INPUT_POST, 'bango');
$bana = fncSeiki($bans);
if($bana < 10) $bana = "0".$bana;
$bango = "d338".$bana;
$result1 = pg_query("select * from tbl_namae where bango ='".$bango."';");

// POSTメソッドのときのみ実行
$t = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (pg_numRows($result1) != 0) {
        // 認証が成功したとき
        // セッションIDの追跡を防ぐ
        session_regenerate_id(true);
         // ユーザ名をセット
        $_SESSION['username'] = $username;
		$_SESSION['id'] = $bango;
        // ログイン完了後に / に遷移
		$result2 = pg_query("select * from tbl_data where bango ='".$bango."'"); 
		if(pg_numRows($result2) != 0)			header('Location: home.php');
        else if(pg_numRows($result2) ==0)	header('Location: general.php');
        exit;
    }
    // 認証が失敗したとき
    // 「403 Forbidden」
//    http_response_code(403);
		$t = 0;
}

header('Content-Type: text/html; charset=UTF-8');

?>
<!DOCTYPE html>
<head>
<title>ログインページ[?W</title>

<link rel="stylesheet" type="text/css" href="./assets/loginstyle.css">
<link rel="stylesheet" type="text/css" href="./assets/button.css">

</head></table>
<body>
<h1>>ログインしてください</h1>
<hr />

<p style="font-size: 15px;padding-top: 0">例: 1番 -> 1 , 36番 -> 36</p>

<table align="center">
<tr><th>
<form method="post">
   	出席番号</th>
   	<td><input type="text" name="bango" value="" required>
    <input type="hidden" name="token" value="<?=h(generate_token())?>"></td></tr>
</table>

<button type="submit" class="btn btn-red btn-border-o">ログイン</button></form>
<?php  if ($t== 0): ?>
<p style="color: red;">入力された文字が数字でなかったか、出席番号と一致しませんでした。</p>
<?php endif; ?>

</body>
</html>