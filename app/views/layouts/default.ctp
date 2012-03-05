<!DOCTYPE html>
<html>
	<head>
		<title>Contest Application</title>
		<?php 
			echo $html->css('core');
		
			echo $scripts_for_layout;
			
			echo $this->Js->writeBuffer( array('cache'=>TRUE) );
		?>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<?php echo $html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home') ); ?>
				<div id="authdiv">
				<?php 
					if (!empty($user)) {
						
						echo 'Hi, ' . $user['username'] . '&nbsp; [ ';
						
						echo $this->Html->link('Log out', 
													array('plugin'=>null, 'admin'=>false, 'controller'=>'users', 'action'=>'logout')
												);
												
						echo ' ]';
						
					} else {
						echo $this->Html->link('Log in', 
														array('plugin'=>null, 'admin'=>false, 'controller'=>'users', 'action'=>'login')
													); 
					} 
					
					
				?>
				</div>
			</div>
		
			<div id="content">
				
				<?php 
					echo $this->Session->flash(); 
					
					echo $this->Session->flash('auth');
				?>
				
				<?php echo $content_for_layout; ?>
				
			</div>
		
			<!--div id="footer">
				Created by Randolph Ledesma
			</div-->
		</div>
	</body>
</html>