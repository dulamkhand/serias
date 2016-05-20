<?php if(!in_array($sf_request->getParameter('action'), array('signin', 'signup', 'forgot'))):?>
		<div class="right">
				<?php if($sf_user->isAuthenticated()):?>
				    (<a href="<?php echo url_for('user/profile')?>" class="left white"><?php echo substr($sf_user->getAttribute('email'), 0, 24)?></a>)
				    <a style="text-decoration:underline;margin:0 0 0 5px" href="<?php echo url_for('user/logout')?>" class="left white">Гарах</a>
				<?php else:?>
						<!--login form-->
						<?php $form = new LoginForm()?>
						<form action="<?php echo url_for('user/signin')?>" method="post" id="sign-header" class="left" title="Нэвтрэх" style="padding:0px;z-index:2;">
						    <?php echo $form['email'] ?>
						    <?php echo $form['password'] ?>
						    <button type="submit" class="left upper white" style="line-height:22px;cursor:pointer;z-index:1001;margin-right:5px;border:0;"/>Нэвтрэх</button>
						</form>
				    <div class="left" style="margin:5px 8px 0 3px;width:1px;height:14px;background:#eee;display:block;"></div>
				    <a href="<?php echo url_for('user/signup')?>" class="left upper white" style="line-height:22px;cursor:pointer;z-index:1001;margin-right:10px;border-left:1px">Бүртгүүлэх</a>
				<?php endif?>
		</div>
		<?php include_partial('user/signJs')?>
<?php endif?>