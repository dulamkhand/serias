<form action="<?php echo url_for('banner/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save"/>
          &nbsp;<a href="<?php echo url_for('banner/index') ?>">Back to list</a>
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
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fullname_mn']->renderLabel() ?></th>
        <td>
          <?php echo $form['fullname_mn']->renderError() ?>
          <?php echo $form['fullname_mn'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nickname']->renderLabel() ?></th>
        <td>
          <?php echo $form['nickname']->renderError() ?>
          <?php echo $form['nickname'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['profession']->renderLabel() ?></th>
        <td>
          <?php echo $form['profession']->renderError() ?>
          <?php echo $form['profession'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['height']->renderLabel() ?></th>
        <td>          
          <?php echo $form['height']->renderError() ?>
          <?php echo $form['height'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['birthday']->renderLabel() ?></th>
        <td>
          <?php echo $form['birthday']->renderError() ?>
          <?php echo $form['birthday'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['deadday']->renderLabel() ?></th>
        <td>
          <?php echo $form['deadday']->renderError() ?>
          <?php echo $form['deadday'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['about']->renderLabel() ?></th>
        <td>
          <?php echo $form['about']->renderError() ?>
          <?php echo $form['about'] ?>
        </td>
      </tr>
			<tr>
        <th><?php echo $form['about_mn']->renderLabel() ?></th>
        <td>
          <?php echo $form['about_mn']->renderError() ?>
          <?php echo $form['about_mn'] ?>
        </td>
      </tr>
			<tr>
        <th><?php echo $form['facebook']->renderLabel() ?></th>
        <td>          
          <?php echo $form['facebook']->renderError() ?>
          <?php echo $form['facebook'] ?>
        </td>
      </tr>
			<tr>
        <th><?php echo $form['twitter']->renderLabel() ?></th>
        <td>          
          <?php echo $form['twitter']->renderError() ?>
          <?php echo $form['twitter'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['web']->renderLabel() ?></th>
        <td>          
          <?php echo $form['web']->renderError() ?>
          <?php echo $form['web'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_active']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_active']->renderError() ?>
          <?php echo $form['is_active'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_featured']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_featured']->renderError() ?>
          <?php echo $form['is_featured'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sort']->renderLabel() ?></th>
        <td>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>