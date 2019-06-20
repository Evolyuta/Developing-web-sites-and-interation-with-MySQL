<pre>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    var_dump($_FILES);
    $n = $_FILES["userfile"]["name"];
    $t = $_FILES["userfile"]["tmp_name"];
    if (!is_dir("upload"))
        mkdir("upload");
    move_uploaded_file($t, "upload/" . $n);
}
?>
<form action='upload.php' method='post' enctype='multipart/form-data'>
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="4096">-->
    <input type='file' name='userfile'>
    <input type='submit'>
</form>
