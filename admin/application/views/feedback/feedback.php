<style>
    .form-group-sp {
        margin-bottom: 0px;
        width: 100%;
    }

    .input-group-sp {
        width: 100%;
    }
</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.js"></script>

<div class="col-lg-10 right_panel manage_mem">
    <div class="row">
        <div class="col-lg-6">
            <span class="dashboard_toggle"><i class="fa fa-bars"></i>Products</span>
        </div>
        <div class="col-lg-6 text-right">
           
        </div>
    </div>

    <div class="row sortable">


    <div class="col-lg-6">
         <div class="row formboard">
           <div class="col-lg-12">
           <form class="fr_form modes" action="<?php echo site_url('product/insertupdate_product'); ?>" method="post" enctype="multipart/form-data" >
        <input type="hidden"  name="feedback_id" value="<?php if(isset($feedback['feedback_id'])){ echo $feedback['feedback_id'];}?>" >
        
         <h3>Product</h3>
         <div class="form-group">
           <label>Enter feedback content</label>
           <input type="text" name="feedback_content" onblur="check_slug(this.value)" required value="<?php if(isset($feedback['feedback_content'])){ echo $product['feedback_content'];}?>" placeholder="Enter content">
         </div>              
         <div class="form-group">
           <label>feedback auther</label>
           <input type="text" name="feedback_auther" required value="<?php if(isset($product['feedback_auther'])){ echo $pfeedback['feedback_auther'];}?>" placeholder="Enter auther name">
         </div>
         
         <div class="form-group">
           <label>feedback Date</label>
           <p><input type="text" id="datepicker"></p>
 
         </div>

        
         
         
         <hr>

         <button class="cancle">Cancel</button><button type="submit" id="subm" class="submit">Save</button>

       </form>
     </div>
   </div>
        </div
     




        







    