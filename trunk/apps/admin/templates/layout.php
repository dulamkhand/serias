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
            		<li <?php echo $tab == 'league' ? 'class="current"' : '' ?>>
                  <?php echo link_to('League', 'league/index')?>
                </li>
                <li <?php echo $tab == 'team' ? 'class="current"' : '' ?>>
                  <?php echo link_to('Team', 'team/index')?>
                </li>
                <li <?php echo $tab == 'player' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Player', 'player/index')?>
                </li>
                <li <?php echo $tab == 'match' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Match', 'match/index')?>
                </li>
                <li <?php echo $tab == 'feedback' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Feedback', 'feedback/index')?>
                </li>
                <li <?php echo $tab == 'place' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Place', 'place/index')?>
                </li>
                <li <?php echo $tab == 'admin' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Admin', 'admin/index')?>
                </li>
                <li <?php echo $tab == 'user' ? 'class="current"' : '' ?>>
                    <?php echo link_to('User', 'user/index')?>
                </li>
            <!--login-->
            <li><?php echo link_to('Logout ('.$sf_user->getEmail().')', 'admin/logout')?></li>
        </ul></div><!--topmenu-->
    
        <br clear="all">   
        <div id="submenu">
            <?php 
            if(in_array($tab, array('team'))) { 
                echo link_to('+ Add', 'team/new');
                echo link_to('List all', 'team/index');
            } else if(in_array($tab, array('player'))) { 
                echo link_to('+ Add', 'player/new');
                echo link_to('List all', 'player/index');
            } else if(in_array($tab, array('news'))) {
                echo link_to('+ Add', 'news/new');
                echo link_to('List all', 'news/index');
            } else if($tab == 'quote' && $sf_user->hasCredential('quote')) { 
                # quote
                echo link_to('+ Add', 'quote/new');
                echo link_to('List all', 'quote/index');
            } else if(in_array($tab, array('poll','pollOption')) && $sf_user->hasCredential('poll')) { 
                # poll
                echo link_to('Polls', 'poll/index', array('class'=>(($tab == 'poll' && $act == "index") ? 'current' : '')));
                echo link_to('+ Add poll', 'poll/new', array('class'=>($tab == 'poll' && $act != "index" ? 'current' : '')));
                if($sf_params->get('pollId')) echo link_to('Options', 'pollOption/index?pollId='.$sf_params->get('pollId'), array('class'=>($tab == 'pollOption' && $act == "index" ? 'current' : '')));
                echo link_to('+ Add option', 'pollOption/new?pollId='.$sf_params->get('pollId'), array('class'=>($tab == 'pollOption' && $act != "index" ? 'current' : '')));
            } else if(in_array($tab, array('quiz','quizQuestion','quizAnswer','quizOption')) && $sf_user->hasCredential('quiz')) { 
                # quiz
                echo link_to('Quizs', 'quiz/index', array('class'=>(($tab == 'quiz' && $act == "index") ? 'current' : '')));
                echo link_to('+ Add quez', 'quiz/new', array('class'=>($tab == 'quiz' && $act != "index" ? 'current' : '')));
                echo link_to('Questions', 'quizQuestion/index?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizQuestion' && $act == "index" ? 'current' : '')));
                echo link_to('+ Add question', 'quizQuestion/new?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizQuestion' && $act != "index" ? 'current' : '')));
                echo link_to('Answers', 'quizAnswer/index?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizAnswer' && $act == "index" ? 'current' : '')));
                echo link_to('+ Add answer', 'quizAnswer/new?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizAnswer' && $act != "index" ? 'current' : '')));
            } else if($tab == 'subscriber' && $sf_user->hasCredential('subscriber')) { 
                # subscriber
                echo link_to('+ Add', 'subscriber/new');
                echo link_to('List all', 'subscriber/index');
            } else if($tab == 'admin' && $sf_user->hasCredential('admin')) { 
                # admin
                echo link_to('+ Add', 'admin/new');
                echo link_to('List all', 'admin/index');
            } else if($tab == 'user' && $sf_user->hasCredential('user')) { 
                # user
                echo link_to('+ Add', 'user/new');
                echo link_to('List all', 'user/index');
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
          2013 - 2015 &copy;  <a href="http://www.mnba.mn" target="_blank">www.mnba.mn</a>
          <br clear="all">
        </div>
    <?php endif;?>
    
</body>
</html>
