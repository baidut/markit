<!DOCTYPE html>
<html>
<head>
	<meta charset = 'utf-8'>
	<title><?=$title?></title>
</head>
<body>
<h1><?=$heading?></h1>

<ol>
	<?php foreach($query->result() as $row): ?>
	<li><a href=<?=$row->link?> ><?=$row->title?></li>
	<?php endforeach; ?>
</ol>
	
</body>
</html>