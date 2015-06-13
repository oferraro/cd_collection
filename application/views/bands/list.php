<?php 
$message = $this->session->flashdata('message'); ?>
<h3><?php echo $message; ?></h3>

<?php
if (count($bands)>0):?>
<div class="row form-list">
	<div class="col-md-8">Artist Name</div>
	<div class="col-md-2">Edit</div>
	<div class="col-md-2">Delete</div>
</div>
<?php
endif; 

while (list ($i, $b) = each ($bands)): 
	$bandPos = current($bands);
	$class = empty($bandPos)? 'form-list-last':''; ?>
	<div class="row form-list <?php echo $class; ?>">
	  <div class="col-md-8"><?php echo $b->name; ?></div>
	  <div class="col-md-2"><a href="<?php echo base_url().$this->uri->segment(1); ?>/bands_edit/<?php echo $b->id; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></div>
	  <div class="col-md-2"><a onClick="return confirm('Are you sure about delete this Band?')" href="<?php echo base_url().$this->uri->segment(1); ?>/bands_delete/<?php echo $b->id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></div>
	
	</div>
<?php
//	echo "<pre>"; print_r($b); echo "</pre>";
endwhile; 
