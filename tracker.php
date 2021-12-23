<?php
require ($_SERVER["DOCUMENT_ROOT"]."/config/db_config.php");
$connection = @mysql_connect($db_host, $db_user, $db_password) or die ("error connecting");
mysql_select_db($db_name, $connection);

$this_page = $_SERVER["PHP_SELF"];
$IP = $_SERVER["REMOTE_ADDR"];
$date_auto = time();

$query = "INSERT INTO tracker (page, IP, date_auto) VALUES ('$this_page','$IP', '$date_auto')";
mysql_query($query, $connection);

$query = "SELECT count(*) FROM tracker WHERE page = '$this_page'";
$result = mysql_query($query, $connection);
$views = mysql_result($result, 0, "count(*)");

echo "This page has been views $views times";
?>

