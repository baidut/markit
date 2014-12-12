<!DOCTYPE html>
<html>
<head>
	<meta charset = 'utf-8'>
	<title><?=$title?></title>
</head>
<body>
<h1><?=$heading?></h1>

<ol>
	<?php foreach($marks as $mark): ?>
	<li><a href=<?=$mark['link']?> ><?=$mark['title']?></li>
	<?php endforeach; ?>
</ol>
	
</body>
</html>