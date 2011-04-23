<?php
/*
 *      list.php
 *
 *
 */
include 'config.php';

function get_list(){
	$logs = array();
	$link=mysql_connect(DB_HOST, DB_UNAME, DB_PASSWD);
	mysql_select_db(DB_NAME);
	$query = "SELECT * FROM `log` WHERE `name` <> ''";
	$result=mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		array_push($logs,$row);
	}
	return $logs;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.20" />
	<style>
	body{
		text-align:center;
		background-color: #000;
		color: #fff;
	}
	a{
		color: #a63a30;
		text-decoration: none;
	}
	.clear {
		clear:both
	}
	</style>

</head>

<body>
<table border="1">

<?php
$all_logs=get_list();
foreach($all_logs as $log){
	echo "<tr>";
	if(!empty($log['name'])){ echo "<td>{$log['name']}</td>"; }else{ echo "<td> -- </td>"; }
	if(!empty($log['organization'])){ echo "<td>{$log['organization']}</td>"; }else{ echo "<td> -- </td>"; }
	if(!empty($log['email'])){ echo "<td><a href='mailto:{$log['email']}'>{$log['email']}</a></td>"; }else{ echo "<td> -- </td>"; }
	if(!empty($log['website'])){ echo "<td><a href='http://{$log['website']}'>{$log['website']}</a></td>"; }else{ echo "<td> -- </td>"; }
	if(!empty($log['twitter'])){ echo "<td><a href='http://twitter.com/{$log['twitter']}'>@{$log['twitter']}</a></td>"; }else{ echo "<td> -- </td>"; }
	echo "</tr>";
}
?>
</table>

</body>

</html>
