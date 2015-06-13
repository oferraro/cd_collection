<form method="post" enctype="multipart/form-data">

<?php 
	$path = getcwd().'/uploads/'; ?>

<div class="input-group">
	<div class="col-md-12">
		<p>Band Name: 
		<select class="selectpicker" name="band">
		<?php
			foreach ($bands as $b): 
				?><option value="<?php echo $b->id; ?>" <?php echo (isset($albumEdit->band_id) && $albumEdit->band_id == $b->id)?" selected ":""; ?>><?php echo $b->name; ?></option><?php
			endforeach; ?>
		</select>
		</p>
	</div>
</div>

<div class="input-group">
	<div class="col-md-12">
		<p>Artist: 
		<select class="selectpicker" name="artist">
<?php foreach ($artists as $a): ?>
		  <option value="<?php echo $a->id; ?>" <?php echo (isset($albumEdit->artist_id) && $albumEdit->artist_id == $a->id)?" selected ":""; ?>><?php echo $a->name . " " . $a->last_name; ?></option>
<?php endforeach; ?>
		</select>
		</p>
	</div>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Album Title: </span>
  <input type="text" class="form-control" placeholder="Album Title" aria-describedby="basic-addon1"  name="album_title" value="<?php echo (isset($albumEdit->album_title)?$albumEdit->album_title:""); ?>" required pattern="^([a-zA-Z0-9\ \.\-\_]){2,}$">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon2">Year: </span>
  <input type="year" class="form-control" placeholder="Year" aria-describedby="basic-addon2"  name="year" value="<?php echo (isset($albumEdit->year)?$albumEdit->year:""); ?>" required pattern="^([0-9]){4}$">
</div>

<div class="input-group">
  <span class="input-group-addon">Cover Photo: </span>
  <input type="file" class="form-control"  name="cover_photo" accept=".png,.jpg,.gif">
<?php 
	if (isset($albumEdit->cover_photo)&&file_exists($path.$albumEdit->cover_photo)&&!is_dir($path.$albumEdit->cover_photo)):?>
		<img src="<?php echo base_url().'/uploads/'.$albumEdit->cover_photo; ?>" width="50px" height="50"><?php
	endif; 
	if (isset($albumEdit->id)):?>
		<input type="hidden" name="id" value="<?php echo $albumEdit->id; ?>">
<?php	
	endif;?>
</div>


<br>

<button type="submit" class="btn btn-default">Submit</button>

</form>
