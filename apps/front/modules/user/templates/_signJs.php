<script type="text/javascript">
$('#email').click(function(){
    if($(this).val().trim() == "Жш: <?php echo sfConfig::get('app_sign_demo_email')?>"){
        $(this).val('');
        $(this).css('color', '#000');
    }
}).blur(function() {
    if($(this).val().trim() == ""){
        $(this).val('Жш: <?php echo sfConfig::get('app_sign_demo_email')?>');
        $(this).css('color', '#aaa');
    }
});
</script>