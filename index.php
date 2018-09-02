<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/plugins/jquery.min.js"></script>
		<script src="js/plugins/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
		<?php

			$request_uri = explode('/index.php', $_SERVER['REQUEST_URI'], 2);

			switch($request_uri[1])
			{
				case '':
					require '/view/contact.php';
				break;
				case '?contact':
					require '/view/contact.php';
				break;
				default:
					require '/view/404.php';
				break;
			}
		?>
		</div>
	</body>
</html>