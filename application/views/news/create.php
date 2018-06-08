<?php echo validation_errors(); ?>


<?php echo form_open('news/create'); ?>
<div class="row">
	<div class="col-xs-1 lbl">
    	<label for="title">Title</label>
	</div>
	<div class="col-xs-5">    
    	<input type="input" name="title"/>
	</div>
</div>
<div class="row">    
	<div class="col-xs-1 lbl">
    	<label for="text">Text</label>
	</div>
	<div class="col-xs-5">    
    	<textarea name="text"></textarea>
	</div>
</div>	    
<div class="row">
	<div class="col-xs-1 lbl">
    	<label for="title">Date</label>
	</div>
	<div class="col-xs-5">    
    	<input type="input" name="date" value="<?php echo date("Y-m-d H:i:s");?>"/>
	</div>
</div>
<div class="row"> 
	<div class="col-xs-1"></div>
    <div class="col-xs-5 btnsub"><input type="submit" name="submit" value="Create news item" />
    </div>
</div>
</form>
<div class="row btnsub">
<a href="../login/logout">Log Out</a>
</div>

