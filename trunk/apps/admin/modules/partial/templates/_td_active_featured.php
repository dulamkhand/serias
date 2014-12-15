<td nowrap>
    <b>Active: </b><?php if($rs->getIsActive()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?><br>
    <b>Featured: </b><?php if($rs->getIsFeatured()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?>
</td>