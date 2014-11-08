<form action="<?php echo url_for('bests/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save" />
          &nbsp; <?php echo link_to('Back to list', 'bests/index', array()) ?>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
          <th><?php echo $form['best_type']->renderLabel() ?></th>
          <td>
            <?php echo $form['best_type']->renderError() ?>
            <?php echo $form['best_type'] ?>
          </td>
      </tr>      
      <tr>
          <th><?php echo $form['number']->renderLabel() ?></th>
          <td>
            <?php echo $form['number']->renderError() ?>
            <?php echo $form['number'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['item_id']->renderLabel() ?></th>
          <td>
          	<select name="bests[item_id]" id="content_category_id">
          			<?php $itemId = $form->getObject() ? $form->getObject()->getItemId() : $sf_params->get('itemId');?>
          			<option <?php echo ''?>><?php echo $itemId?></option>
          	</select>
          	
            <?php echo $form['item_id']->renderError() ?>
            <?php echo $form['item_id'] ?>
          </td>
      </tr>
    </tbody>
  </table>
</form>


<script type="text/javascript">
function loadItems() {
  $.ajax({
      url: "<?php echo url_for('bests/loadItems')?>",
      data: {itemId : $('#bests_item_id').val(), objectId: <?php echo $objectId ? $objectId : 0?>},
      type: "POST",
      success: function(data){
          $('#containerBestId').html('<select id="bests_item_id" name="bests[item_id]">' + data + '</select>');
      }
  });
  return false;
}

$(document).ready(function() {
    loadItems();
});
</script>