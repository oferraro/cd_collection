<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="navbar navbar-inverse">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		
		<ul class="nav navbar-nav">
		  <li <?php echo ($this->uri->segment(1)==''?'class="active"':""); ?>><a href="<?php echo base_url(); ?>">Home</a></li>
		</ul>

		
		<li class="dropdown <?php echo ($this->uri->segment(1)=='band'?'active':""); ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bands <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>band/bands_add">Add</a></li>
            <li><a href="<?php echo base_url(); ?>band/bands_list">List</a></li>
          </ul>
        </li>
		  		  
		<li class="dropdown <?php echo ($this->uri->segment(1)=='album'?'active':""); ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Albums (Collections) <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>album/albums_add">Add</a></li>
			<li><a href="<?php echo base_url(); ?>album/albums_list">List</a></li>
          </ul>
        </li>
		  
		<li class="dropdown <?php echo ($this->uri->segment(1)=='artist'?'active':""); ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Artists <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>artist/artists_add">Add</a></li>
            <li><a href="<?php echo base_url(); ?>artist/artists_list">List</a></li>
          </ul>
        </li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>
