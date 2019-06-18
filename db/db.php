<?
$link = mysqli_connect('localhost','root','','web');

$sql = "SELECT name FROM teachers";
//echo $sql;
$result = mysqli_query($link, $sql);
/*if (!$result){
  echo "Error :"
          . mysqli_errno($link)
          . ':'
          . mysqli_error($link);
  
}*/

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($row);


mysqli_close($link);
?>