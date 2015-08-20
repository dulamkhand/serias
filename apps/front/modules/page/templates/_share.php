<a target="_blank" title="Share on Facebook" 
    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
    class="left" style="background:#1061bb;display:block;height:26px;width:90px;padding:0 0 0 10px;border-radius:4px;margin:0;" 
    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>&amp;title=<?php echo $title?>">
    <?php echo image_tag('icons/share-fb.png', array('class'=>'left', 'style'=>'margin:1px 0 0 0;'))?>
    <h2 class="left" style="color:#fff;">Түгээх</h2>
</a>

<a target="_blank" title="Share on Twitter" 
    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
    class="left" style="background:#3ccaeb;display:block;height:26px;width:92px;padding:0 0 0 10px;border-radius:4px;margin:0 0 0 2px;" 
    href="https://twitter.com/share?url=<?php echo $url?>&amp;via=<?php echo sfConfig::get('app_webname')?>&amp;text=<?php echo $title?>">
    <?php echo image_tag('icons/share-tw.png', array('class'=>'left', 'style'=>'margin:0 2px 0 0;'))?>
    <h2 class="left" style="color:#fff;">Жиргэх</h2>
</a>

<a target="_blank" title="Share on Youtube" 
    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
    class="left" style="background:#FF212A;display:block;height:26px;width:90px;padding:0 0 0 10px;border-radius:4px;margin:0 0 0 2px;" 
    href="https://twitter.com/share?url=<?php echo $url?>&amp;via=<?php echo sfConfig::get('app_webname')?>&amp;text=<?php echo $title?>">
    <?php echo image_tag('icons/share-g.png', array('class'=>'left', 'style'=>'margin:0 2px 0 0;'))?>
    <h2 class="left" style="color:#fff;">Тараах</h2>
</a>
<br clear="all">