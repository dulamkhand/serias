<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>  
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
	<?php include_stylesheets() ?>    
  <?php include_javascripts() ?>
	<?php $host = sfConfig::get('app_host')?>
	<link rel="shortcut icon" href="<?php echo $host?>/favicon.ico" />
  <!--jquery-->
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
	<script src="<?php echo $host?>/js/jquery.min.js"></script>  
</head>

<body>
    <?php if($sf_user->isAuthenticated()):?>
        <div id="topmenu"><ul>
            <?php $tab = isset($tab) ? $tab : $sf_request->getParameter('module'); ?>
            <?php $act = isset($act) ? $act : $sf_request->getParameter('action'); ?>
            		<li <?php echo $tab == 'item' ? 'class="current"' : '' ?>>
                  <?php echo link_to('Item', 'item/index')?>
                </li>
                <li <?php echo $tab == 'link' ? 'class="current"' : '' ?>>
                  <?php echo link_to('Link', 'link/index')?>
                </li>
                <?php if($sf_user->hasCredential('bests')):?>
                		<li <?php echo $tab == 'bests' ? 'class="current"' : '' ?>>
		                  <?php echo link_to('Bests', 'bests/index')?>
		                </li>
                <?php endif?>
                <?php if($sf_user->hasCredential('admin')):?>
		                <li <?php echo $tab == 'admin' ? 'class="current"' : '' ?>>
		                    <?php echo link_to('Admin', 'admin/index')?>
		                </li>
                <?php endif?>
            <li><?php echo link_to('Logout ('.$sf_user->getEmail().')', 'admin/logout')?></li>
        </ul></div><!--topmenu-->
    
        <br clear="all">   
        <div id="submenu">
            <?php 
            if($tab == 'link') { 
                echo link_to('+ new', 'link/new?itemId='.$sf_params->get('itemId'));
                echo link_to('list', 'link/index?itemId='.$sf_params->get('itemId'));
            } else {
            		include_partial('partial/sublink', array('tab'=>$tab));
            }
            ?>
            <br clear="all">
        </div><!--topmenu-->
    <?php endif ?>

    <div id="wrapper">
      <div id="content" class="full">
          <?php if ($sf_user->hasFlash('flash')): ?>
              <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
          <?php endif; ?>
  
          <?php echo $sf_content ?>
      </div><!--content-->
    </div><!--wrapper-->
    
    <?php if($sf_user->isAuthenticated()):?>
        <div id="footer">
          <div class="right" style="margin:0 5px 0 0;">
              Copyright © 2013-2016 www.mmdb.mn
          </div>
          <br clear="all">
        </div>
    <?php endif;?>
    
</body>
</html>
