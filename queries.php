<?php 

include('lib/db.class.php');



$myDB = new Database();
$myDB->connect();

$sql = mysql_query("
	SELECT *
	FROM yourls_url AS l
	WHERE keyword LIKE '%$searchTerm%'
	OR title LIKE '%$searchTerm%'
	OR url LIKE '%$searchTerm%'
	LIMIT 100");

print "<table><tr><th>shortlink</th><th>url</th><th>title</th></tr>";

while($row = mysql_fetch_array($sql))
{
	print "<tr><td>".$row['keyword']."</td><td>".myTrim($row['url'], 24)."</td><td>".$row['title']."</td></tr>";
}


function myTrim($inputString, $length, $stringTrailer = '[...')
{
	$reallength = $length - strlen($stringTrailer) - strlen($inputString);

	$output = substr($inputString, 0, $length) . $stringTrailer;
	return $output;
}

print "</table>";


?>