<header>
	<div class="row">
		<div class="col-lg-6">
			<p>Management - Admin Console</p>
		</div>

		<div class="col-lg-6 text-right">
			<p>
        Welcome Nathan Tim Thomas <a class="open_dropdown"><img src="<?= base_url(); ?>assets/images/user.png"></a>
          <div class="dropdown_panel">
            <a href="#">My Account</a>
            <a href="#">Company Profile</a>
            <a href="#">Logout</a>
          </div>
      </p>

		</div>
	</div>
</header>

<section class="dashboard">
	<div class="row">
		<div class="col-lg-2 left_panel">
			 <img src="<?= base_url(); ?>assets/images/logo.png" class="logo">


       <?php
          $conc = $this->uri->segment(1);
          $met = $this->uri->segment(2);
       ?>
       <span class="open_nav_toggle"><i class="fa fa-bars"></i></span>
       <ul class="nav flex-column">
         <li class="nav-item">
           <a class="nav-link active" href="<?= base_url(); ?>dashboard">Dashboard</a>
         </li>

         <li class="nav-item dropdown dropright <?php if ($conc == "home") { echo "show"; } ?>">
           <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Pages</a>
            <div class="dropdown-menu <?php if ($conc == "home") { echo "show"; } ?>">
              <a class="dropdown-item dcdc <?php if ($met == "createpage") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>pages">Create page</a>
              <a class="dropdown-item <?php if ($met == "managepage") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>home/feature">Manage page</a>
              
            </div>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="<?= base_url(); ?>Team">Team</a>
         </li>
          
         <li class="nav-item dropdown dropright <?php if ($conc == "home") { echo "show"; } ?>">
           <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Categories</a>
            <div class="dropdown-menu <?php if ($conc == "home") { echo "show"; } ?>">
              <a class="dropdown-item dcdc <?php if ($met == "createcategory") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>Category">Create category</a>
              <a class="dropdown-item <?php if ($met == "createsubcategory") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>Category/subCategory">Create subcategory</a>
              
            </div>
         </li>
         <li class="nav-item dropdown dropright <?php if ($conc == "home") { echo "show"; } ?>">
           <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Testimonials</a>
            <div class="dropdown-menu <?php if ($conc == "home") { echo "show"; } ?>">
              <a class="dropdown-item dcdc <?php if ($met == "createtestimonials") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>Testimonials">Create Testimonials</a>
              <a class="dropdown-item <?php if ($met == "managetestimonials") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>">Manage Testimonials</a>
              
            </div>
         </li>


         <li class="nav-item">
           <a class="nav-link" href="<?= base_url(); ?>feadbacks">feadbacks</a>
         </li>
         <li class="nav-item dropdown dropright <?php if ($conc == "home") { echo "show"; } ?>">
           <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Products</a>
            <div class="dropdown-menu <?php if ($conc == "home") { echo "show"; } ?>">
              <a class="dropdown-item dcdc <?php if ($met == "createproducts") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>Product">Create Products</a>
              <a class="dropdown-item <?php if ($met == "manageproducts") { echo "mnbgblack"; } ?>" href="<?= base_url(); ?>Products">Manage Testimonials</a>
              
            </div>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="<?= base_url(); ?>Orders">Orders</a>
         </li>


         <li class="nav-item">
           <a class="nav-link" href="<?= base_url(); ?>navigation">Navigation</a>
         </li>
         
         <li class="nav-item">
           <a class="nav-link" href="<?= base_url(); ?>login/authorizeout">Logout</a>
         </li>
         
       </ul>
		</div>
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="width:300px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModalLabel"> Mangement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="messageBody">
        ...
      </div>

    </div>
  </div>
</div>
