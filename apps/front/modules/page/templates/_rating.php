<?php $host = sfConfig::get('app_host')?>


<h6 style="font-size:40px;color:#ff6600;font-weight:bold;margin:15px 0 0 10px;">
    4.7
</h6>

<select id="example-f" name="rating" class="left">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>

<script type="text/javascript">
$('#example-f').barrating({ showSelectedRating:false });
</script>

<br clear="all">
<span class="upper" style="color:#666;">4514 fan rating</span>


<style>
.rating-f .br-widget a {
    background: url('<?php echo $host?>addons/bar-rating/star.png');
    width: 24px;
    height: 24px;
    display: block;
    float: left;
    background-position: 0 24px;
}

@media
only screen and (-webkit-min-device-pixel-ratio: 1.5),
only screen and (min-device-pixel-ratio : 1.5),
(min-resolution: 192dpi) {
    .rating-f .br-widget a {
        background: url('../img/star@2x.png');
        background-size: 24px 48px;
    }
}
</style>