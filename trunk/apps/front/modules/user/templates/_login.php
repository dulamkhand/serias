<script>
function statusChangeCallback(response) {
	  if (response.status === 'connected') {
	    	showName();
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

window.fbAsyncInit = function() {
	  FB.init({
		    appId      : '877037815640906',
		    cookie     : true,  // enable cookies to allow the server to access the session
		    xfbml      : true,  // parse social plugins on this page
		    version    : 'v2.1' // use version 2.1
	  });
	  FB.getLoginStatus(function(response) {
	    	statusChangeCallback(response);
	  });
};

function showName() {
    FB.api('/me', function(response) {
    		console.log(JSON.stringify(response));
	    	$('#fb_button_login').hide();
	      $('#fb_login_status').html(response.name);
    });
}
</script>

<div class="right">
		<?php if($sf_user->isAuthenticated()):?>
		    (<a href="<?php echo url_for('user/profile')?>" class="left white"><?php echo substr($sf_user->getAttribute('email'), 0, 24)?></a>)
		    <a style="text-decoration:underline;margin:0 0 0 5px" href="<?php echo url_for('user/logout')?>" class="left white">Гарах</a>
		<?php else:?>
		    <a onclick="$('#formLogin').dialog({height:310, width:400});" class="left upper white" style="width:50px;line-height:22px;cursor:pointer;z-index:1001;">Нэвтрэх</a>
		    <span class="left" style="margin:6px 8px 0 3px;width:1px;height:14px;background:#fff;display:block;"></span>
		    <a onclick="$('#formRegister').dialog({height:310, width:400});" class="left upper white" style="width:60px;line-height:22px;cursor:pointer;z-index:1001;">Бүртгүүлэх</a>
		<?php endif?>
		
		<div id="fb_button_login">
				<fb:login-button scope="public_profile,email,image" onlogin="checkLoginState();"></fb:login-button>
		</div>
		<a href="<?php echo url_for('user/profile')?>" id="fb_login_status"></a>
</div>