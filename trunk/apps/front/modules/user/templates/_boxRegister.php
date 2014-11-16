<?php $host = sfConfig::get('app_host')?>

<form action="#" method="post" id="formRegister" class="left" title="Бүртгүүлэх" style="padding:30px 70px 0px 70px;z-index:2;">
    <div id="errorRegister"></div>

    <?php echo $form['email']->renderLabel() ?>
    <br clear="all">
    <?php echo $form['email'] ?>
    <br clear="all">
    <?php echo $form['password']->renderLabel() ?>
    <br clear="all">
    <?php echo $form['password'] ?>
    
    <br clear="all">
    <button onclick="submitRegisterForm();return false;" class="buttonOrange" 
          style="width:262px;padding:2px 90px;">БҮРТГҮҮЛЭХ</button>
</form>


<script type="text/javascript">
function submitRegisterForm()
{
  $.ajax({
      url: "<?php echo url_for('user/doRegister')?>",
      type : "POST",
      data: $("#formRegister").serialize(),
      beforeSend: function()
      {
          $('#errorRegister').html('<img src="<?php echo $host?>images/loading.gif" style="margin:0 120px;" />');
      },
      onLoading : function ()
      {
          $('#errorRegister').html('<img src="<?php echo $host?>images/loading.gif" style="margin:0 120px;" />');
      },
      success: function(data)
      {
          $('#errorRegister').html(data);
      }
  });
}
</script>
