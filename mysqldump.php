<?

$username=$_GET["username"];
$password=$_GET["password"];
$database=$_GET["database"];
$hostname=$_GET["hostname"];

$cmd="mysqldump -h ".$hostname." -u ".$username." -p".$password." ".$database;
echo $success."<br/>";
echo eshell($cmd,$success);
if($success!=0) {
    echo "Something went wrong when trying to export<br/>";
    echo "cmd: ".$cmd."<br/>";
}
system($cmd);


function eshell($cmd,&$success) {
    $return_string="";
    exec($cmd,$output_array,$success);
    
    foreach($output_array as $output) {
	    $return_string.=$output."\n";
    }
    return $return_string;
}

// system("mysqldump -h ekir.fatcowmysql.com -u linkpaper -ppowerrangers666 linkpaper > ".$database_file);
?>