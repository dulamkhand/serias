<form action="<?php echo url_for('image/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '?objectId='.$rs->getId())) ?>" method="POST" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<table width="28%" style="float:left;margin:0 20px 0 0;">
  <tfoot>
    <tr><td colspan="2" style="padding:5px;">&nbsp;</td></tr>
    <tr>
      <td colspan="2">
        <?php echo $form->renderHiddenFields(false) ?>
        <input type="submit" value="Save" />
        &nbsp;<a href="<?php echo url_for($objectType.'/index') ?>">Back to object list</a>
      </td>
    </tr>
  </tfoot>
  <tbody>
    <?php echo $form->renderGlobalErrors() ?>
    <tr>
        <td valign="top">
            <div style="margin:10px 0 1px 0;font-weight:bold;">Зураг *:</div>
            <?php echo $form['filename']->renderError() ?>
            <?php echo $form['filename'] ?>
            <?php echo $form['filename']->renderHelp() ?>
          
            <div style="margin:10px 0 1px 0;font-weight:bold;">Тайлбар:</div>
            <?php echo $form['description']->renderError() ?>
            <?php echo $form['description'] ?>
            <?php echo $form['description']->renderHelp() ?>
       
            <br clear="all">
            <label style="display:block;margin:10px 0 1px 0;font-weight:bold;">
                <?php echo $form['iscover']->renderError() ?>
                <?php echo $form['iscover'] ?> Cover зураг эсэх
                <?php echo $form['iscover']->renderHelp() ?>
            </label>
            
            <br clear="all">
            <div style="margin:10px 0 1px 0;font-weight:bold;">Дэс дараалал:</div>
            <?php echo $form['sort']->renderError() ?>
            <?php echo $form['sort'] ?>
            <?php echo $form['sort']->renderHelp() ?>
        </td>
    </tr>
  </tbody>
</table>

<div style="width:750px;float:left;">
    <a href="<?php echo url_for($objectType.'/edit?id='.$rs->getId())?>" title="Edit object">[edit object]</a>
    <h1><?php echo $rs?></h1>
    <?php $images = GlobalTable::doFetchArray('Image', array('id, folder, filename, description'), 
                  array('objectId'=>$rs->getId(), 'objectType'=>$objectType, 'isActive'=>'all', 'orderBy'=>'sort ASC'));?>
    <?php foreach ($images as $image) {?>
        <div class="left" style="width:120px;height:300px;margin:0 5px 0 0;">
            <a href="<?php echo url_for('image/edit?id='.$image['id'])?>" title="Edit image">[edit image]</a><br>
            <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('image/delete?id='.$image['id'])?>" title="Delete">[delete image]</a><br>
            <?php echo image_tag('/u/'.$image['folder'].'/t120-'.$image['filename'], array('style'=>'max-width:120px;'));?><br>
            <?php echo $image['description'];?>    
        </div>
    <?php }?>
</div>
</form>