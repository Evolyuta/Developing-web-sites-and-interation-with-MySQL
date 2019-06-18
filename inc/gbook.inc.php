<?php
/* Основные настройки */


const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = "";
const DB_NAME = 'gbook';

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());

/* Основные настройки */
function clearStr($data)
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}

/* Сохранение записи в БД */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clearStr($_POST['name']);
    $email = clearStr($_POST['email']);
    $msg = clearStr($_POST['msg']);
    //$name = ($name) ? $name : '';
    ////$email = ($email) ? $email : '';
    /// //$msg = ($msg) ? $msg : '';

    $sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name','$email','$msg')";
    mysqli_query($link, $sql);
    header("Location: " . $_SERVER["REQUEST_URI"]);
    exit;
}


/* Сохранение записи в БД */

/* Удаление записи из БД */

if (isset($_GET['del'])) {
    $del = abs((int)$_GET['del']);
    if ($del) {
        $sql = "DELETE FROM msgs WHERE id = $del";
        mysqli_query($link, $sql);
    }
}

/* Удаление записи из БД */
?>
    <h3>Оставьте запись в нашей Гостевой книге</h3>

    <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        Имя: <br/><input type="text" name="name"/><br/>
        Email: <br/><input type="text" name="email"/><br/>
        Сообщение: <br/><textarea name="msg"></textarea><br/>

        <br/>

        <input type="submit" name="send" value="Отправить!"/>

    </form>

<?php
/* Вывод записей из БД */

$sql = "SELECT id, name, email, msg, 
                  UNIX_TIMESTAMP(datetime) as dt 
            FROM msgs ORDER by id DESC";
$result = mysqli_query($link, $sql);

$row_count = mysqli_num_rows($result);
echo "<p>Всего записей в гостевой книге: $row_count</p>";

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($row as $val) {
    $date = date("d-m-Y", $val[dt]);
    $time = date("H:i", $val[dt]);
    $msg = nl2br($val{'msg'});
    echo <<<MSG
    <p>
      <a href="mailto:{$val['email']}">{$val['name']}</a>
      {$date} в {$time} написал: <br />{$msg}
    </p>
    
    <p align = "right">
    <a href = "index.php?id=gbook&del={$val['id']}">Удалить</a>
    </p>
MSG;
}


/* Вывод записей из БД */
?>

