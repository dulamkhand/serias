<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_partial("partial/head", array());?> 

<div style="width:1081px;margin:0 auto;">
	<?php include_partial("partial/header", array());?>  
	<!--flash message-->
	<?php if ($sf_user->hasFlash('flash')): ?>
		<div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
	<?php endif; ?> 
	<?php echo $sf_content ?>		
</div>

<br clear="all">
<?php include_partial("partial/bannerFooter", array());?>
<br clear="all">
<br clear="all">
<?php include_partial("partial/footer", array());?>

<div style="display:none;">
    <?php include_partial("user/boxLogin", array('form'=>new LoginForm()))?>
    <?php include_partial('user/boxRegister', array('form'=>new RegisterForm()))?>
</div>

</body>
</html>