<style>
    .form-group-sp {
        margin-bottom: 0px;
        width: 100%;
    }

    .input-group-sp {
        width: 100%;
    }
</style>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->

<div class="col-lg-10 right_panel manage_mem">
    <div class="row">
        <div class="col-lg-6">
            <span class="dashboard_toggle"><i class="fa fa-bars"></i>Category</span>
        </div>
        <div class="col-lg-6 text-right">
           
        </div>
    </div>

    <div class="row sortable">

        <div class="col-lg-6">
         <div class="row formboard">
           <div class="col-lg-12">
           <form class="fr_form modes" action="<?php echo site_url('category/insertupdate_category'); ?>" method="post" enctype="multipart/form-data" >
        <input type="hidden"  name="category_id" value="<?php if(isset($category['category_id'])){ echo $category['category_id'];}?>" >
         <h3>Category</h3>
         <div class="form-group">
           <label>Category Name</label>
           <input type="text" name="category_name" onblur="check_slug(this.value)" required value="<?php if(isset($category['category_name'])){ echo $category['category_name'];}?>" placeholder="category Name">
         </div>
        
         <div class="form-group">
           <label>Category Slug</label>
           <input type="text" name="category_type_slug" id="slug" onblur="check_slug1(this.value)" required value="<?php if(isset($category['category_type_slug'])){ echo $category['category_type_slug'];}?>" placeholder="slug Name">
           <label id="subcity" style="color:red;"></label>
        </div>    



         
         <hr>

         <button class="cancle">Cancel</button><button type="submit" id="subm" class="submit">Save</button>

       </form>
     </div>
   </div>
        </div>
     
        <div class="col-lg-6">
            <div class="visible_items">
                <div class="overflow_tbl">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>Category Name</th>
                                <th>Category slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Category Name</th>
                                <th>Category slug</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php          
      
      $filtergroup = $this->Common_model->getall('shope_categories', 'category_id', 'desc');
                                   
                                    $sl = 0;

                                    foreach ($filtergroup as $dataa) {
                                        $sl++;

                                        ?>
                        <tr>
                        <td><?= $dataa->category_name; ?></td>
                        <td><?= $dataa->category_type_slug; ?></td>
                                            
                        <td><a href="<?= base_url() ?>category/editcategory/<?= $dataa->category_id; ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a href="<?= base_url() ?>category/delete_category/<?= $dataa->category_id; ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                               
                                            </td>
                            </tr>
                            

                            <?php  } ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>











    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/manage.js"></script>
    <script>
                    function check_slug(id) {
                    var a ="<?php echo $this->uri->segment(3) ?>";

                    if(a !=""){
                        var ids= a ;
                    }else{
                        var ids= ""; 
                    }
                            $.ajax({
                                url: "<?php echo site_url('category/check_slug') ?>",
                                data: {'val': id,'vale': ids},
                                type: "post",
                                success: function(datas) {
                                    $("#slug").val(datas);
                                }
                            });

                    
                    }

                    function check_slug1(id) {
                    var a ="<?php echo $this->uri->segment(3) ?>";

                    if(a !=""){
                        var ids= a ;
                    }else{
                        var ids= ""; 
                    }
                    $("#subcity").html('');
                    $("#subm").prop('disabled', false);
                            $.ajax({
                                url: "<?php echo site_url('category/check_slug1') ?>",
                                data: {'val': id,'vale': ids},
                                type: "post",
                                success: function(datas) {
                                    if(datas==1){
                                        $("#subcity").html('Slug already Exist');
                                        $("#subm").prop('disabled', true);
                                    }
                                
                                }
                            });

                    
                    }

                    