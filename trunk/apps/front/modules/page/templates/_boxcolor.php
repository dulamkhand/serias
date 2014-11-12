<?php $host = sfConfig::get('app_host')?>
<?php $color = GlobalLib::getValue('colors', $type);?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2><?php echo GlobalLib::getValue('type_mn', $type)?></h2>
    <div style="background:#333;padding:10px;">
        <?php foreach($rss as $rs):?>
            <div style="width:<?php echo $width?>px;height:<?php echo $height?>px;margin:0 10px 0 0;position:relative;" class="left">
                <?php $loved = in_array($rs['id'], $loves)?>
                <?php echo image_tag('icons/'.( $loved ? 'love.ico' : 'unlove.ico'), 
                      array('alt'=>($loved ? 'Unlove!' : 'Love!'),
                      'onclick'=>"love({$rs['id']}, '".($loved ? 'unlove' : 'love')."');", 
                      'style'=>'position:absolute;right:0;bottom:20px;z-index:1000;cursor:pointer;', 'class'=>'love'))?>
                <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" style="color:#fff;">
                    <?php echo image_tag('/u/m/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;max-width:'.$width.'px'))?>
                    <br clear="all">
                    <span style="line-height:13px;color:#fff;"><?php echo $rs['title']?> (<?php echo $rs['year']?>)</span>
                </a>
            </div>
        <?php endforeach;?>
        <br clear="all">
    </div><!--box-333-->
    
    <?php if(isset($more) && $more):?>
        <a href="<?php echo url_for('page/index?type='.$type)?>" class="right" style="margin:10px 0 0 0;">
          <h3 style="color:#fff;">Цааш &raquo;</h3></a>
    <?php endif?>
</div><!--box-home-->
<br clear="all">

<script type="text/javascript">
$('.love').mouseover(function() {
    if($(this).attr('alt') == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/love.ico');
        $(this).attr('alt') == 'Love!'
    } else {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove.ico');
        $(this).attr('alt') == 'Unlove!'
    }
}).mouseout(function() {
    if($(this).attr('alt') == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove.ico');
        $(this).attr('alt') == 'Unlove!'
    } else {
        $(this).attr('src', '<?php echo $host?>images/icons/love.ico');
        $(this).attr('alt') == 'Love!'
    }
});

function love(itemId, act)
{
  $.ajax({
      url: "<?php echo url_for('user/love')?>",
      type : "POST",
      data: {itemId:itemId, act:act},
      success: function(data) {
          if(act == 'love') {
              $(this).attr('src', '<?php echo $host?>images/icons/love.ico');
              $(this).attr('alt') == 'Unlove!'
          } else { // unlove
              $(this).attr('src', '<?php echo $host?>images/icons/unlove.ico');
              $(this).attr('alt') == 'Love!'
          }
      }
  });
}
</script>
