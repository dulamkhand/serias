<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <?php $host = sfConfig::get('app_host')?>
  <link rel="shortcut icon" href="<?php echo $host?>/favicon.ico" />
 

  <!-- JQUIRY -->
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
  <script src="<?php echo $host?>/js/jquery.min.js"></script>  
   
  <!-- FONTS -->
  <?php use_stylesheet('/addons/fonts/open-sans.css') ?>
  <?php use_stylesheet('/addons/fonts/roboto.css') ?>  
  
	<?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>
<body>

  <?php include_partial("global/leftside", array());?>  

  <div id="center">
      <?php include_partial("partial/bannerTop", array());?>

      <!--flash message-->
      <?php if ($sf_user->hasFlash('flash')): ?>
          <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
      <?php endif; ?>
      
      <?php echo $sf_content ?>    
  </div><!--center-->
  
  <br clear="all">
  <?php //include_partial("global/footer", array());?>  

</body>
</html>
