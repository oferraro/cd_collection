<?php $bandEdit = (isset($bandEdit[0]))?$bandEdit[0]:false;  ?>
<form id="bandsForm" method="post" action="<?php echo base_url().$this->uri->segment(1); ?>/<?php echo ($bandEdit)?'bands_edit':'bands_add'?>" enctype="multipart/form-data">

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Band Name: </span>
  <input type="text" class="form-control" placeholder="Band Name" aria-describedby="basic-addon1"  name="band_name" value="<?php echo(isset($bandEdit->name))?$bandEdit->name:""; ?>" required pattern="^([_A-z0-9 ]){3,}$">
</div>

<?php if (isset($bandEdit->id)):?><input type="hidden" name="id" value="<?php echo $bandEdit->id; ?>"><?php
endif; ?>

<p><button type="submit" class="btn btn-default">Submit</button></p>

</form>

