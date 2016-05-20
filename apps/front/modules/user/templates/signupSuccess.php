<div style="margin:50px auto;width:350px;">
		
		<?php include_partial('user/signError', array('form'=>$form))?>

		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>

		<br clear="all">
  	<br clear="all">

		<a href="<?php echo url_for('user/profile')?>" id="fb_login_status"></a>	
		<div id="fb_button_login">
				 <fb:login-button scope="public_profile,email,image" onlogin="checkLoginState();"></fb:login-button> 
		</div>
			
		<br clear="all">
  	<br clear="all">
		эсвэл
		<br clear="all">
		<br clear="all">
		
		<form action="<?php echo url_for('user/signup')?>" method="post" id="sign-page" title="Бүртгүүлэх">
				<span class="upper">Нэр</span><br>
		    <?php echo $form['firstname'] ?>
		    <br clear="all">
		    
		    <span class="upper">Овог</span><br>
		    <?php echo $form['lastname'] ?>
		    <br clear="all">
		    
		    <span class="upper">Утасны дугаар</span><br>
		    <?php echo $form['mobile'] ?>
		    <br clear="all">
		    
		    
				<span class="upper">Имэйл хаяг</span><br>
		    <?php echo $form['email'] ?>
		    <br clear="all">
		    
		    <span class="upper">Нууц үг</span><br>
		    <?php echo $form['password'] ?>
		    <br clear="all">
		    <br clear="all">
		    
		    <button type="submit" class="left upper" value="Бүртгүүлэх" title="Бүртгүүлэх"/>Бүртгүүлэх</button>
				<a href="<?php echo url_for('user/signin')?>" class="left underline upper link" title="Нэвтрэх">
		    		Нэвтрэх <img width="25" src="/images/icons/more2.png">
				</a>
		</form>
		
		<br clear="all">
		<br clear="all">
		<br clear="all">
		<br clear="all">
		<div class="timestamp">Бүртгүүлэх товчийг дарснаар та Монголын кино мэдээллийн нэгдсэн сангийн <a href="<?php echo url_for('main/terms')?>">Үйлчилгээний нөхцөл</a>-г зөвшөөрч байгаа болно. 
		Манай вэбсайтын <a href="<?php echo url_for('main/privacy')?>">Нууцлалын бодлого</a>-той танилцана уу.</div> <!--TODO: need open in fancybox?-->
</div>
<?php include_partial('user/signJs')?>