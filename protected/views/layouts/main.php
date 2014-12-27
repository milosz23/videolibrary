<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/compass/stylesheets/screen.css">
	<link rel="shortcut icon" href="ico.jpg">
	<title>VideoLibrary</title>
</head>
<body>
<div id="container">	
	<h1>VideoLibrary</h1>
	<div id="mainmenu" class="nonlist">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Add video', 'url'=>array('/video/index')),
				array('label'=>'Library', 'url'=>array('/video/library')),
			),
		)); ?>
	</div><!-- mainmenu -->
		
<div class="content">
<?php echo $content; ?>
</div>
</div>
</body>
</html>