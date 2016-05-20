<div style="margin:50px auto;width:350px;">

		<?php echo $form->renderGlobalErrors()?>

		<form action="<?php echo url_for('user/forgot')?>" method="post" id="sign-page" title="Сэргээх">
				<span class="upper">Таны бүртгэлтэй имэйл хаяг</span><br>
		    <?php echo $form['email'] ?>
		    <button type="submit" class="left upper" value="Сэргээх" title="Сэргээх"/>Нууц үг сэргээх</button>
		    <br clear="all">		    
		    <br clear="all">
		    
		    <a href="<?php echo url_for('user/signup')?>" class="left underline upper link" title="Бүртгүүлэх" style="margin-left:0;">
		    		Бүртгүүлэх <img width="25" src="/images/icons/more2.png">
				</a>
				<a href="<?php echo url_for('user/signin')?>" class="left underline upper link" title="Нэвтрэх">
		    		Нэвтрэх <img width="25" src="/images/icons/more2.png">
				</a>
		</form>
</div>
<?php include_partial('user/signJs')?>