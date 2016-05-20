<script>
function statusChangeCallback(response) {
	  if (response.status === 'connected') {
	    	doLoginFB();
	  } else if (response.status === 'not_authorized') {
				$('#fb_button_login').show();	    	
	  } else {
	    	$('#fb_button_login').show();
	  }
}

function checkLoginState() {
	  FB.getLoginStatus(function(response) {
	    	statusChangeCallback(response);
	  });
}

function doLoginFB() {
    FB.api('/me', function(response) {
    		//console.log(JSON.stringify(response));
	    	$('#fb_button_login').hide();
	      $('#fb_login_status').html(response.name);
	      // TODO
    });
}
</script>

<div style="margin:50px auto;width:350px;">

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
		
		<form action="<?php echo url_for('user/signin')?>" method="post" id="sign-page" title="Нэвтрэх">
				<span class="upper">Имэйл хаяг</span><br>
		    <?php echo $form['email'] ?>
		    <br clear="all">
		    
		    <span class="upper">Нууц үг</span><br>
		    <?php echo $form['password'] ?>
		    <br clear="all">
		    <a href="<?php echo url_for('user/forgot')?>" class="underline lower" style="margin:0 0 0 3px; font-size:14px;line-height:16px;">Нууц үгээ мартсан</a>
		    <br clear="all">		    
		    <br clear="all">
		    
				<button type="submit" class="left upper" value="Нэвтрэх" title="Нэвтрэх"/>Нэвтрэх</button>
		    <a href="<?php echo url_for('user/signup')?>" class="left underline upper link" title="Бүртгүүлэх">
		    		Бүртгүүлэх <img width="25" src="/images/icons/more2.png">
				</a>
		</form>
</div>
<?php include_partial('user/signJs')?>