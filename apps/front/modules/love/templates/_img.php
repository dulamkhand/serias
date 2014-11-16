<?php echo image_tag('icons/'.( $isLoved ? 'love.ico' : 'unlove.ico'), 
      array('alt'=>($isLoved ? 'Unlove!' : 'Love!'),
      'onclick'=>$sf_user->isAuthenticated() ? 
              "love({$id}, '".($isLoved ? 'unlove' : 'love')."');" 
            : "$('#formLogin').dialog({height:310, width:400});", 
      'style'=>'position:absolute;right:0;bottom:20px;z-index:1;cursor:pointer;', 
      'class'=>'love', 'id'=>'love'.$id))?>

