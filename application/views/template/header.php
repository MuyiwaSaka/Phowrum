<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/favicon.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?=base_url("assets/css/ie10-viewport-bug-workaround.css");?>" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
		<header id="header" class="navbar navbar-fixed-top">
			<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#">Phowrum</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
				  <ul class="nav navbar-nav">
  					<li class="active"><a href="#" id="mainlink">Main</a></li>
            <?php foreach($sections as $section): ?>
                <li><?php echo anchor("section/view/${section['section_id']}",$section['section_name'])?></li>
            <?php endforeach; ?>
  					<li><a href="#about">About</a></li>
  					<li><a href="#contact">Contact</a></li>
  					<li class="dropdown">
  					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
  					  <ul class="dropdown-menu">
    						<li><a href="#">Action</a></li>
    						<li><a href="#">Another action</a></li>
    						<?php if ($this->ion_auth->logged_in() &&($this->ion_auth->is_admin())):?><li><a href="#">This is some admin shit</a></li><?php endif; ?>
    						<li role="separator" class="divider"></li>
    						<li class="dropdown-header">Nav header</li>
    						<li><a href="#">Separated link</a></li>
    						<li><a href="#">One more separated link</a></li>
  					  </ul>
  					</li>
				  </ul>
				</div>
				<?php echo $nav; ?>



		</header>

    <script  src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
