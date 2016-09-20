<?
require_once("config.php");

function query2array($query)
{
 $return_array=array();
 $result=mysql_query($query);
 while($tmp_object=mysql_fetch_object($result))
 {
   array_push($return_array,$tmp_object);
 }
 return($return_array);
}

/* Prints the information of a php object or array. Good for debuggning! */
function object_output($obj)
{
 echo "<pre>".print_r($obj,true)."</pre>";
}

session_start();
// echo "<pre>".print_r($_SESSION,true)."</pre>";
$query=$_GET["query"];

$cmd_array=split(";",$query);

$word_array=split(" ",$cmd_array[0]);
if($word_array[0]=="use") {
  echo "switching database to ".$word_array[1];
  $_SESSION["sqlfront"]["database"]=$word_array[1];
  die();
}





$username=$_SESSION["sqlfront"]["username"];
$password=$_SESSION["sqlfront"]["password"];
$hostname=$_SESSION["sqlfront"]["hostname"];

mysql_connect($hostname,$username,$password);

// mysql_connect($cfg_host,$cfg_username,$cfg_password);
mysql_select_db($_SESSION["sqlfront"]["database"]);



$result=mysql_query($query);

?>
     <table border="1">
     <thead>
     <tr>
     <?php
     for ($i=0;$i<mysql_num_fields($result);$i++) {
       echo('<th>'.mysql_field_name($result,$i).'</th>');
     }
     ?>
     </tr>
     </thead>
      <tbody>
     <?php
     while ($row = mysql_fetch_row($result)) {
       echo('<tr>');
       for ($i=0;$i<mysql_num_fields($result);$i++) {
         echo('<td>'.$row[$i].'</td>');
       }
       echo('</tr>');
     }
     ?>
     </tbody>
     </table>