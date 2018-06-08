<?php echo validation_errors(); ?>
<?php echo $loginstatus; ?>
<?php echo form_open('login/submit'); ?>
<div class="row">
	<div class="col-xs-1 lbl">
		<label for="username">Username</label>
    </div>
	<div class="col-xs-5">    
    	<input type="input" name="username"/>
	</div>
</div>
<div class="row">
	<div class="col-xs-1 lbl">
		<label for="password">Password</label>
    </div>
	<div class="col-xs-5">    
    	<input type="password" name="password"/>
	</div>
</div>
<div class="row"> 
	<div class="col-xs-1"></div>
    <div class="col-xs-5 btnsub"><input type="submit" name="submit" value="Login" />
    </div>
</div>
</form>