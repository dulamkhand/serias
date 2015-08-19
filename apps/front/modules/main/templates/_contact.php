<form action="<?php echo url_for('main/contact')?>" method="post">
		<?php echo $form->renderGlobalErrors() ?>
		<br clear="all">
    <?php echo $form['organization']->renderError() ?>
    <?php echo $form['organization'] ?>
    <br clear="all">
    <?php echo $form['name']->renderError() ?>
    <?php echo $form['name'] ?>
    <br clear="all">
    <?php echo $form['email']->renderError() ?>
    <?php echo $form['email'] ?>
    <br clear="all">
    <?php echo $form['phone']->renderError() ?>
    <?php echo $form['phone'] ?>
    <br clear="all">
    <?php echo $form['message']->renderError() ?>
    <?php echo $form['message'] ?>
    <br clear="all">

  	<button class="button" type="submit" style="border:1px solid #ccc;border-radius:2px;-moz-border-radius:2px;background:#e2e2e2;padding:4px 25px;color:#444;" value="Илгээх">
      	Илгээх
  	</button>
</form>