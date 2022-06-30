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
            <span class="dashboard_toggle"><i class="fa fa-bars"></i>Navigation</span>
        </div>
        <div class="col-lg-6 text-right">
           
        </div>
    </div>

    <div class="row sortable">

        <div class="col-lg-6">
         <div class="row formboard">
           <div class="col-lg-12">
           <form class="fr_form modes" action="<?php echo site_url('pages/insertupdate_page'); ?>" method="post" enctype="multipart/form-data" >
        <input type="hidden"  name="pageId" value="<?php if(isset($page['pageId'])){ echo $page['pageId'];}?>" >
        
         <h3>Page</h3>
         <div class="form-group">
           <label>Page Name</label>
           <input type="text" name="pageName" onblur="check_slug(this.value)" required value="<?php if(isset($page['pageName'])){ echo $page['pageName'];}?>" placeholder="Item Name">
         </div>
         <div class="form-group">
           <label>Page Title</label>
           <input type="text" name="pageTitle" required value="<?php if(isset($page['pageTitle'])){ echo $page['pageTitle'];}?>" placeholder="Item Name">
         </div>
         <div class="form-group">
           <label>Page Slug</label>
           <input type="text" name="slug" id="slug" onblur="check_slug1(this.value)" required value="<?php if(isset($page['slug'])){ echo $page['slug'];}?>" placeholder="Item Name">
           <label id="subcity" style="color:red;"></label>
        </div>
         <div class="form-group">
           <label>Page Content</label>
           <textarea  name="pageContent" id="mytextarea"><?php if(isset($page['pageContent'])){ echo $page['pageContent'];}?></textarea>
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
                                <th>Page Name</th>
                                <th>Page Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Page Name</th>
                                <th>Page Title</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php          
      
      $filtergroup = $this->Common_model->getall('shope_pages', 'pageId', 'desc');
                                   
                                    $sl = 0;

                                    foreach ($filtergroup as $dataa) {
                                        $sl++;

                                        ?>
                        <tr>
                        <td><?= $dataa->pageName; ?></td>
                        <td><?= $dataa->pageTitle; ?></td>
                                            
                                <td><a href="<?= base_url() ?>pages/editpage/<?= $dataa->pageId; ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a href="<?= base_url() ?>pages/delete_page/<?= $dataa->pageId; ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                               
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
                                url: "<?php echo site_url('pages/check_slug') ?>",
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
                                url: "<?php echo site_url('pages/check_slug1') ?>",
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

                    </script>
                        <script>
                    tinymce.init({
                    selector: 'textarea',
                    
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks fullscreen',
                        'insertdatetime media table paste help wordcount','code'
                    ],
                    toolbar: 'undo redo code | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    
                    });

                    </script>