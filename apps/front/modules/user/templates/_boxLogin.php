<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('user/doLogin')?>" method="post" id="formLogin" class="left" title="Нэвтрэх" style="padding:0px;z-index:2;">
    <?php echo $form['email'] ?>
    <?php echo $form['password'] ?>
    <button type="submit" class="left upper white" style="line-height:22px;cursor:pointer;z-index:1001;margin-right:5px;border:0;"/>НЭВТРЭХ</button>
</form>

<script type="text/javascript">
$('#login-email').click(function(){
    if($(this).val().trim() == "Имэйл хаяг"){
        $(this).val('');
    }
}).blur(function() {
    if($(this).val().trim() == ""){
        $(this).val('Имэйл хаяг');
    }
});

$('#login-password').val('Нууц үг');
$('#login-password').click(function(){
    if($(this).val().trim() == "Нууц үг"){
        $(this).val('');
    }
}).blur(function() {
    if($(this).val().trim() == ""){
        $(this).val('Нууц үг');
    }
});
</script>