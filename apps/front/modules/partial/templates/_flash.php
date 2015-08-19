<!--flash message-->
<?php if ($sf_user->hasFlash('flash')): ?>
	<div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
<?php endif; ?> 