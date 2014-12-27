<form action="<?php echo url_for('celebrity/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save"/>
          &nbsp;<a href="<?php echo url_for('celebrity/index') ?>">Back to list</a>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['fullname']->renderLabel() ?></th>
        <td>
          <?php echo $form['fullname']->renderError() ?>
          <?php echo $form['fullname'] ?>
          <?php echo $form['fullname']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fullname_mn']->renderLabel() ?></th>
        <td>
          <?php echo $form['fullname_mn']->renderError() ?>
          <?php echo $form['fullname_mn'] ?>
          <?php echo $form['fullname_mn']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nickname']->renderLabel() ?></th>
        <td>
          <?php echo $form['nickname']->renderError() ?>
          <?php echo $form['nickname'] ?>
          <?php echo $form['nickname']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['profession']->renderLabel() ?></th>
        <td>
            <?php $params = $sf_params->get('professions') ? $sf_params->get('professions') : explode(";", $form->getObject()->getProfession());?>
            <?php $choices = GlobalLib::getArray('profession');?>
            <select id="celebrity_profession" name="professions[]" style="height:200px;width:200px;" multiple="1">
                <?php foreach ($choices as $k=>$v):?>
                    <option value="<?php echo $k?>" <?php echo in_array($k, $params) ? 'selected': ''?>><?php echo $v?></option>
                <?php endforeach;?>
            </select><br>
            <?php echo $form['profession']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['height']->renderLabel() ?></th>
        <td>          
          <?php echo $form['height']->renderError() ?>
          <?php echo $form['height'] ?>
          <?php echo $form['height']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['birthday']->renderLabel() ?></th>
        <td>
          <?php echo $form['birthday']->renderError() ?>
          <?php echo $form['birthday'] ?>
          <?php echo $form['birthday']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['deadday']->renderLabel() ?></th>
        <td>
          <?php echo $form['deadday']->renderError() ?>
          <?php echo $form['deadday'] ?>
          <?php echo $form['deadday']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['about']->renderLabel() ?></th>
        <td>
          <?php echo $form['about']->renderError() ?>
          <?php echo $form['about'] ?>
          <?php echo $form['about']->renderHelp() ?>
        </td>
      </tr>
			<tr>
        <th><?php echo $form['about_mn']->renderLabel() ?></th>
        <td>
          <?php echo $form['about_mn']->renderError() ?>
          <?php echo $form['about_mn'] ?>
          <?php echo $form['about_mn']->renderHelp() ?>
        </td>
      </tr>
			<tr>
        <th><?php echo $form['facebook']->renderLabel() ?></th>
        <td>          
          <?php echo $form['facebook']->renderError() ?>
          <?php echo $form['facebook'] ?>
          <?php echo $form['facebook']->renderHelp() ?>
        </td>
      </tr>
			<tr>
        <th><?php echo $form['twitter']->renderLabel() ?></th>
        <td>          
          <?php echo $form['twitter']->renderError() ?>
          <?php echo $form['twitter'] ?>
          <?php echo $form['twitter']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['web']->renderLabel() ?></th>
        <td>          
          <?php echo $form['web']->renderError() ?>
          <?php echo $form['web'] ?>
          <?php echo $form['web']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['source']->renderLabel() ?></th>
        <td>          
          <?php echo $form['source']->renderError() ?>
          <?php echo $form['source'] ?>
          <?php echo $form['source']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_active']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_active']->renderError() ?>
          <?php echo $form['is_active'] ?>
          <?php echo $form['is_active']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_featured']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_featured']->renderError() ?>
          <?php echo $form['is_featured'] ?>
          <?php echo $form['is_featured']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sort']->renderLabel() ?></th>
        <td>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
          <?php echo $form['sort']->renderHelp() ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

<style>
#celebrity_birthday_date{width:100px;}
#celebrity_birthday_hour{width:50px;}
#celebrity_birthday_minute{width:50px;}
#celebrity_deadday_date{width:100px;}
#celebrity_deadday_hour{width:50px;}
#celebrity_deadday_minute{width:50px;}
</style>