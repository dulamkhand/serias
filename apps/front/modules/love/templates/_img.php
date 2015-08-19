<?php echo image_tag('icons/'.( $isLoved ? 'love16.ico' : 'unlove16.ico'), 
      array('alt'=>($isLoved ? 'Unlove!' : 'Love!'),
      'onclick'=>$sf_user->isAuthenticated() ? 
              "love({$id}, 16);" 
            : "$('#formLogin').dialog({height:310, width:400});", 
      'style'=>'position:absolute;right:0;bottom:20px;z-index:1;cursor:pointer;', 
      'class'=>'love16', 'id'=>'love'.$id))?>

