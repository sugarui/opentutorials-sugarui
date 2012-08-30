<?php
	//1. connect databases;
	$link = mysql_connect('localhost', 'root', 'wordpress');
	if (!$link) {
		die('Could not connect:'.myslq_error());
	}
	//2. seletcion db
	mysql_select_db('opentutorials');
	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");
	if (!empty($_GET['id'])) {
		$query = "SELECT * FROM topic where id=" . $_GET['id'];
		$result = mysql_query($query);
		$topic = mysql_fetch_assoc($result);
	}
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="wordpress" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	<style>
  	body {
            font-size:0.8em;   
            font-family: dotum;
            line-height:1.6em;
        }
        body.black{
            background-color: black;
            color:white;
        }
        body.black a{
            color:white;
        }
        body.black a:hover{
            color:#f60;
        }
        body.black header{
            border-bottom:1px solid #333;
        }
        body.black nav {
            border-right: 1px solid #333;
        }
        header{
            border-bottom:1px solid #ccc;
            padding: 20px 0; }
        #toolbar {
            padding:10px;
            float:right;
        }
        nav{
            float:left;
            margin-right: 20px;
            min-height: 500px;
            border-right:1px solid #ccc;
        }
        nav ul{
            list-style:none;
            padding-left:0;
            padding-right:20px;
        }
        article{
            float:left;
        }
        footer{
            clear:both;
        }
        a {
            text-decoration:none;
        }
        a:link,
        a:visited{
            color:#333;
        }
        a:hover {
            color:#f60;
        }
        h1 {
            font-size:1.4em;
        }	
	</style>
</head>
<body id="body">
	<div>
		<header>
			<h1>Javascript</h1>
		</header>
		<div id="toolbar">
			<input type="button" value="black" onclick="document.getElementById('body').className='black'" />
			<input type="button" value="white" onclick="document.getElementById('body').className='white'" />
		</div>
		<nav>
			<ul>
				<?php
				$sql = "select id, title from topic";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_assoc($result)) {
					echo "<li><a href=\"?id={$row['id']}\">{$row['title']}</a></li>";
				}
				?>
			</ul>
		</nav>
		<article>
			<h2><?=$topic['title'] ?></h2>
			<div>
				<?=$topic['description'] ?>
			</div>
		</article>
	</div>
</body>
</html>