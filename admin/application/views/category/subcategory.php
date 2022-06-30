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

<div class="col-lg-10 right_panel manage_mem">
    <div class="row">
        <div class="col-lg-6">
            <span class="dashboard_toggle"><i class="fa fa-bars"></i>Sub category</span>
        </div>
        <div class="col-lg-6 text-right">
           
        </div>
    </div>
            <div class="row sortable">

            <div class="col-lg-6">
            <div class="row formboard">
            <div class="col-lg-12">
            <form class="fr_form modes" action="<?php echo site_url('category/insertupdate_subcaegory'); ?>" method="post" enctype="multipart/form-data" >
            <input type="hidden"  name="sub_category_id" value="<?php if(isset($subcategory['sub_category_id'])){ echo $subcategory['sub_category_id'];}?>" >
             <h3><?= $headding; ?></h3>
            <div class="form-group">
            <label>Sub Category Name</label>
            <input type="text" name="sub_category_name" required value="<?php if(isset($subcategory['sub_category_name'])){ echo $subcategory['sub_category_name'];}?>" placeholder="Sub Category Name">
            </div>
            <div class="form-group">
             <label>Category Select</label>
             <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="category_type" required>
             <option value="">Select</option>
             <?php $category = $this->Common_model->getall('shope_categories', 'category_id', 'desc');
                             foreach ($category as $categorydata) 
                             { ?>
                              <option value="<?= $categorydata->category_id; ?>"
                               <?php if (isset($subcategory['category_type'])) 
                               {
                                  if ($subcategory['category_type'] == $categorydata->category_id) 
                                  {
                                      echo "selected";
                                  }
                              } ?>><?= $categorydata->category_name; ?></option>
                                    <?php   } ?>
             </select>
         </div>
         <hr>

        <button class="cancle">Cancel</button><button type="submit" class="submit">Save</button>

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
                                <th>Sub Category Name</th>
                                <th>Category Type</th>
                               
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sub Category Name</th>
                                <th>Category Type</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php          



      
      $filtergroup = $this->Common_model->getall('shope_sub_categories', 'sub_category_id', 'desc');
                                   
                                    $sl = 0;   

                                    foreach ($filtergroup as $dataa) {
                                        $sl++;
                                        
                                        $category_type = $this->Common_model->getvalue('shope_categories', 'category_id', $dataa->category_type, 'category_name');
                                       
                                        ?>
                        <tr>
                        <td><?= $dataa->sub_category_name; ?></td>
                       <!-- <td><?= $dataa->category_type;?></td> -->
                        <td><?=$category_type;?></td>
                       
                        <td><a href="<?= base_url() ?>Category/editsubcategory/<?= $dataa->sub_category_id; ?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a href="<?= base_url() ?>Category/deletesubcategory/<?= $dataa->sub_category_id; ?>" ><i class="fa fa-trash"></i></a>
                                               
                                            </td>
                            </tr>
                            

                            <?php  } ?>
                            
                            



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div


   
   
   
   
   
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/manage.js"></script>

        <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#blah').show();
            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)       
                    .width(150)
                    .height(125);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLs(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#blah1').show();
            reader.onload = function(e) {
                $('#blah1')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(125);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

    