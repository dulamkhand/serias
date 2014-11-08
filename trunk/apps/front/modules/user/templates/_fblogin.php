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

<div id="fb_button_login">
		<fb:login-button scope="public_profile,email,image" onlogin="checkLoginState();"></fb:login-button>
</div>
<a href="<?php echo url_for('user/profile')?>"><h3 id="fb_login_status"></h3></a>
<br clear="all">
<br clear="all">