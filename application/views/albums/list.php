<?php 
$message = $this->session->flashdata('message'); ?>

<h3><?php echo $message; ?></h3>

<?php

if (count($albums)>0): ?>
	<div class="row form-list">
		<div class="col-md-3">Album Title (Year)</div>
		<div class="col-md-3">Band Name</div>
		<div class="col-md-2">Artist Name</div>
		<div class="col-md-2">Cover Photo</div>
		<div class="col-md-1">Edit</div>
		<div class="col-md-1">Delete</div>
	</div>
<?php
endif; 

$path = getcwd().'/uploads/';
while (list ($i, $a) = each ($albums)): 
	$albumPos = current($albums);
	$class = empty($albumPos)? 'form-list-last':''; ?>
	<div class="row form-list <?php echo $class; ?>">
	  <div class="col-md-3"><?php echo $a->album_title. (($a->year!="")?' ('.$a->year.')':""); ?></div>
	  <div class="col-md-3"><?php echo $a->band_name; ?></div>
	  <div class="col-md-2"><?php echo $a->artist_name; ?></div>
	  <div class="col-md-2"><?php
						if (file_exists($path.$a->cover_photo) && !is_dir($path.$a->cover_photo)):?>
							<img src="<?php echo base_url().'/uploads/'.$a->cover_photo; ?>" width="50px" height="50" data-toggle="modal" data-target="#modalPic_<?php echo $a->id; ?>">
							<!-- Modal -->
							<div id="modalPic_<?php echo $a->id; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><?php echo $a->album_title; ?></h4>
								  </div>
								  <div class="modal-body">
									  <img src="<?php echo base_url().'/uploads/'.$a->cover_photo; ?>">
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div><?php
						endif; ?></div>
	  <div class="col-md-1"><a href="<?php echo base_url().$this->uri->segment(1); ?>/albums_edit/<?php echo $a->id; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>
	  <div class="col-md-1"><a onClick="return confirm('Are you sure about delete this Album?')" href="<?php echo base_url().$this->uri->segment(1); ?>/albums_delete/<?php echo $a->id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></div>
	
	</div>
<?php
//	echo "<pre>"; print_r($a); echo "</pre>";
endwhile; 

