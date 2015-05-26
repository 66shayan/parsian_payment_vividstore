<?php  
defined('C5_EXECUTE') or die(_("Access Denied.")); 
extract($vars);
?>

<div class="form-group">
    <label><?php echo t("Parsian Bank PIN Code")?></label>
    <input type="text" name="ParsianPIN" value="<?php echo $PIN?>" class="form-control">
</div>

<div class="form-group">
    <label><?php echo t("Parsian Bank Callback URL")?></label>
    <input type="text" name="ParsianCallbackURL" value="<?php echo $sysurl?>" class="form-control">
</div>

/* OR if above does not work we will go for this example

<div class="form-group">
    <?=$form->label('PINCode',t('PINCode'))?>
    <?=$form->input('PIN',$PIN)?>
</div>

<div class="form-group">
    <?=$form->label('callbackurl',t('callbackurl'))?>
    <?=$form->input('sysurl',$sysurl)?>
</div>

*/