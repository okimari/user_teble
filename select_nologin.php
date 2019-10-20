<?php

//1. DB接続
include('user_functions.php');

// ログイン状態のチェック
$menu02 = menu02();

$pdo = connectToDb();

//データ表示SQL作成
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
//データ表示
$view = '';
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $view .= '<table class="table" style="table-layout: fixed; overflow-wrap : break-word;">';
        $view .= '<thead class="thead-light">';
        $view .= '<tr>';
        $view .= '<th>' . $result['id'] . '</t>';
        $view .= '<a href="detail_nologin.php?id=' . $result['id'] . '" class="badge badge-primary">Edit</a>';
        $view .= '<td>' . $result['name'] . '</td>';
        $view .= '<td>' . $result['lid']  . '</td>';
        $view .= '<td>' . $result['lpw']  . '</td>';
        $view .= '<td>' . $result['kanri_flg']  . '</td>';
        $view .= '<td>' . $result['life_flg']  . '</td>';
        $view .= '</tr>';
        $view .= '</tbody>';
        $view .= '</table>';
    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー管理</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ユーザー管理</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?= $menu02 ?>
                </ul>
            </div>
        </nav>
    </header>

    <div>
        <ul class="table">
            <table class="table" style="table-layout: fixed;">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>ユーザー名</th>
                        <th>ログインID</th>
                        <th>パスワード</th>
                        <th>0:一般<br>1:管理者</th>
                        <th>0:アクティブ<br>1:非アクティブ</th>
                    </tr>
                </thead>
            </table>
            <?= $view ?>
        </ul>
    </div>

</body>

</html>