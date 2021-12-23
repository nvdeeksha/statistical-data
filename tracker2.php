<?php

require ($_SERVER["DOCUMENT_ROOT"]."/config/db_config.php");
$connection = @mysql_connect($db_host, $db_user, $db_password) or die ("error connecting");
mysql_select_db($db_name, $connection);

$query = "SELECT * FROM tracker GROUP BY IP";
$result = mysql_query($query,  $connection);
$views = mysql_num_rows ($result);
echo $views."unique IPs";

echo "<br>Page views:";
$query = "SELECT *,count(*) FROM tracker GROUP BY page";
$result = mysql_query($query, $connection);

for ($i = 0; $i < mysql_num_rows ($result); $i++)
{
    $page = mysql_result($result, $i, "page");
    $IP = mysql_result($result,$i, "IP");
    $views = mysql_result($result,$i, "count(*)");

    echo "page: $page<br>";
    echo "views: $views<br>";
}

?>













