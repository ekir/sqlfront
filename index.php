<?
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


mysql_connect("localhost","root","CinnamonGirl");
mysql_select_db("moodle");

echo 'hejsan<br>';

//$result=mysql_query("SELECT * FROM mdl_course");
$result=mysql_query("SHOW TABLES");

?>
<p><b>Result Set:</b></p>
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
     </table>e