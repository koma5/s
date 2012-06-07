<?php



include('lib/db.class.php');

if (isset($_REQUEST['q']))$searchTerm = $_REQUEST['q'];
else $searchTerm = NULL;

if($searchTerm != NULL)
{

	$myDB = new Database();
	$myDB->connect();

	$sql = mysql_query("
		SELECT *
		FROM yourls_url AS l
		WHERE keyword LIKE '%$searchTerm%'
		OR title LIKE '%$searchTerm%'
		OR url LIKE '%$searchTerm%'
		LIMIT 100");

	print "<table><tr><th>5th.li/</th><th>favicon</th><th>url</th><th>title</th></tr>";

	while($row = mysql_fetch_array($sql))
	{
		$printUrl = myTrim(remove_http($row['url']), 34);
		$linkUrl = $row['url'];

		$shortLinkUrl = 'http://5th.li/'.$row['keyword'];
		$shortLink = $row['keyword'];

		$parsedUrl = parse_url($row['url']);
		$faviconUrl = 'http://www.google.com/s2/favicons?domain='.$parsedUrl['host'];

		print '<tr><td><a href="'.$shortLinkUrl.'">'.$shortLink.'</a></td><td><a href="'.$shortLinkUrl.'+"><img src="'.$faviconUrl.'" /></a></td><td><a title="'.$linkUrl.'" href="'.$linkUrl.'">'.$printUrl.'</a></td><td>'.$row['title'].'</td></tr>';
	}
	print "</table>";
}
else
{
	echo "<h1>NULL</h1>";
}


function myTrim($inputString, $length, $stringTrailer = '[...]')
{
	if($length >= strlen($stringTrailer) + strlen($inputString))
	{
		return $inputString;
	}
	else
	{
		$length = $length - strlen($stringTrailer) - strlen($inputString);
		$output = substr($inputString, 0, $length) . $stringTrailer;
		return $output;
	}
}


function remove_http($url='') 
{
	return preg_replace("/^https?:\/\/(.+)$/i","\\1", $url);
}

?>