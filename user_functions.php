<?php
//共通で使うものを別ファイルにしておきましょう。
//DB接続関数（PDO）
function connectToDb()
{
    $dbn = 'mysql:dbname=gsacfd04_15;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}
//SQL処理エラー
function showSqlErrorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
}
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}



//menuを指定する
function menu()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="user_index.php">ユーザー登録</a></li><li class="nav-item"><a class="nav-link" href="user_select.php">ユーザー登録一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="user_logout.php">ログアウト</a></li>';
    return $menu;
}

function menu02()
{
    $menu02 = '<li class="nav-item"><a class="nav-link" href="user_index.php">ユーザー登録</a></li>';
    $menu02 .= '<li class="nav-item"><a class="nav-link" href="user_logout.php">ログアウト</a></li>';
    return $menu02;
}
