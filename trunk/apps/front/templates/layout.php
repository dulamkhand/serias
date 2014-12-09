<?php $host = sfConfig::get('app_host')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	  <?php include_http_metas() ?>
	  <?php include_metas() ?>
	  <?php include_title() ?>
	  <link rel="shortcut icon" href="<?php echo $host?>favicon.ico" />
	
	  <!-- JQUIRY -->
	  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
	  <script src="<?php echo $host?>js/jquery.min.js"></script>
	  
	  <!-- ADDONS -->
	  <script src="<?php echo $host?>addons/ui/jquery-ui.min.js"></script>
	  <?php use_stylesheet('/addons/ui/jquery-ui.css') ?>
	  <script src="<?php echo $host?>addons/sticky/jquery.sticky.js"></script>
	  <script src="<?php echo $host?>addons/scrollup/jquery.scrollUp.min.js"></script>
	   
	  <!-- FONTS -->
	  <?php use_stylesheet('/addons/fonts/open-sans.css') ?>
	  <?php use_stylesheet('/addons/fonts/roboto.css') ?>  
	  
		<?php include_stylesheets() ?>
	  <?php include_javascripts() ?>
	  
	  <script type="text/javascript">
				// scroll-up
		    $(function(){
		        $.scrollUp({scrollText:''});
		    });
	  </script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=877037815640906&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


  <?php include_component("partial", "leftside", array());?>  

  <div id="center">
      <?php include_partial("partial/bannerTop", array());?>
      
      <?php include_partial("partial/search", array());?>

      <!--flash message-->
      <?php if ($sf_user->hasFlash('flash')): ?>
          <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
      <?php endif; ?>
      
      <?php echo $sf_content ?>
  </div><!--center-->
  
  <?php include_component("partial", "rightside", array());?>
  
  <br clear="all">
  <?php include_partial("partial/bannerFooter", array());?>
  <br clear="all">
  <br clear="all">
  <?php include_partial("global/footer", array());?>  

</body>
</html>

<div style="display:none;">
    <?php include_partial("user/boxLogin", array('form'=>new LoginForm()))?>
    <?php include_partial('user/boxRegister', array('form'=>new RegisterForm()))?>
</div>