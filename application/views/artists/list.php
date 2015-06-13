<?php 
$message = $this->session->flashdata('message'); ?>
<h3><?php echo $message; ?></h3>

<?php if (isset($artists) && is_array($artists) && count($artists)>0):?>
<div class="row form-list">
	<div class="col-md-4">Artist Name</div>
	<div class="col-md-4">Last Name</div>
	<div class="col-md-2">Edit</div>
	<div class="col-md-2">Delete</div>
</div>
<?php
	endif; 
	
$path = getcwd().'/uploads/';

while (list ($i, $a) = each ($artists)): 
	$artistPos = current($artists);
	$class = empty($artistPos)? 'form-list-last':''; ?>
	<div class="row form-list <?php echo $class; ?>">
	  <div class="col-md-4"><?php echo $a->name; ?></div>
	  <div class="col-md-4"><?php echo $a->last_name; ?></div>
	  <div class="col-md-2"><a href="<?php echo base_url().$this->uri->segment(1); ?>/artists_edit/<?php echo $a->id; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>
	  <div class="col-md-2"><a onClick="return confirm('Are you sure about delete this Album?')" href="<?php echo base_url().$this->uri->segment(1); ?>/artists_delete/<?php echo $a->id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></div>
	
	</div>
<?php
//	echo "<pre>"; print_r($a); echo "</pre>";
endwhile; ?>



