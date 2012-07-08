<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>AutoGenerate</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Le styles -->
    <?php echo Html::style("assets/css/bootstrap.css"); ?>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <?php echo Html::style("assets/css/bootstrap-responsive.css"); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"); ?>
    <![endif]-->
	
    <?php echo Html::script("assets/js/jquery.js"); ?>
    <?php echo Html::script("assets/js/bootstrap.min.js"); ?>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
			<a class="brand" href="">AutoGenerate</a>
		</div>
    </div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<?php echo $body; ?>
	</div>
</div><!--/.fluid-container-->
<div class="container-fluid">
	<hr />
	<footer class="row-fluid">
		<div class="span8">
			<p>2012 &copy; Todos os direitos reservados.</p>
		</div>
		<div class="span4">
			<p>Um produto <?php echo Html::anchor('', 'FelipeBastosWeb'); ?></p>
		</div>
	</footer>
</div>
</body>
</html>