<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_partial("partial/head", array());?>

<div style="width:1081px;margin:0 auto;">
	<?php include_partial("partial/header", array());?>  
	<?php include_partial("partial/leftside", array());?>  
	<div id="center">
			<?php include_partial("partial/flash", array());?>
			<?php echo $sf_content ?>		
	</div><!--center-->
	<?php include_partial("partial/rightside", array());?>
	<br clear="all">
	<?php include_partial("partial/footer", array());?>  
</div>

<div style="display:none;">
    <?php include_partial("user/boxLogin", array('form'=>new LoginForm()))?>
    <?php include_partial('user/boxRegister', array('form'=>new RegisterForm()))?>
</div>

</body>
</html>