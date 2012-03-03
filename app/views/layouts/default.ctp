<!DOCTYPE html>
<html>
	<head>
		<title>Contest Application</title>
		<?php echo $html->css('core'); ?>
	
	</head>
	<body>
		<div id="container">
			<div id="header">
				<?php echo $html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home') ); ?> 
			</div>
		
			<div id="content">
				
				<?php echo $this->Session->flash(); ?>
				
				<?php echo $content_for_layout; ?>
				
			</div>
		
			<!--div id="footer">
				Created by Randolph Ledesma
			</div-->
		</div>
	</body>
</html>