<?php 
	$artistEdit = isset($artistEdit[0])?$artistEdit[0]:false;
?><form method="post" enctype="multipart/form-data">

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Artist Name: </span>
  <input type="text" class="form-control" placeholder="Artist Name" aria-describedby="basic-addon1"  name="name" value="<?php echo (isset($artistEdit->name)?$artistEdit->name:""); ?>" required pattern="^([a-zA-Z0-9\ \.\-\_]){2,}$">
</div>

<div class="input-group">
	<span class="input-group-addon" id="basic-addon2">Last Name: </span>
  <input type="text" class="form-control" placeholder="Last Name" aria-describedby="basic-addon2"  name="last_name" value="<?php echo (isset($artistEdit->last_name)?$artistEdit->last_name:""); ?>" required pattern="^([a-zA-Z0-9\ \.\-\_]){2,}$">
</div>

<?php 
if ($artistEdit):
	?><input type="hidden" name="id" value="<?php echo $artistEdit->id; ?>"><?php 
endif; ?>

<button type="submit" class="btn btn-default">Submit</button>

</form>
