<?php $host = sfConfig::get('app_host')?>

<form action="#" method="post" id="formLogin" class="left" title="Нэвтрэх" style="padding:30px 70px 0px 70px;z-index:2;">
    <div id="errorLogin"></div>
    
    <?php echo $form['email']->renderLabel() ?>
    <br clear="all">
    <?php echo $form['email'] ?>
    <br clear="all">
    <?php echo $form['password']->renderLabel() ?>
    <br clear="all">
    <?php echo $form['password'] ?>
    
    <br clear="all">
    <button onclick="submitLoginForm();return false;" class="buttonOrange" 
          style="width:262px;padding:2px 90px;cursor:pointer;">НЭВТРЭХ</button>
</form>


<script type="text/javascript">
function submitLoginForm()
{
  $.ajax({
      url: "<?php echo url_for('user/doLogin')?>",
      type : "POST",
      data: $("#formLogin").serialize(),
      beforeSend: function()
      {
          $('#errorLogin').html('<img src="<?php echo $host?>images/loading.gif" style="margin:0 120px;" />');
      },
      onLoading : function ()
      {
          $('#errorLogin').html('<img src="<?php echo $host?>images/loading.gif" style="margin:0 120px;"/>');
      },
      success: function(data)
      {
          $('#errorLogin').html(data);
      }
  });
}
</script>