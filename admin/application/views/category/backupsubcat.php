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
            <span class="dashboard_toggle"><i class="fa fa-bars"></i>Sub Category</span>
        </div>
        <div class="col-lg-6 text-right">
           
        </div>
    </div>

    <div class="row sortable">

        <div class="col-lg-6">
        <div class="row formboard">
     <div class="col-lg-12">
     <form class="fr_form modes" action="<?php echo site_url('career/insertupdate_career'); ?>" method="post" enctype="multipart/form-data" >
        <input type="hidden"  name="careerId" value="<?php if(isset($career['careerId'])){ echo $career['careerId'];}?>" >
        <h3><?= $headding; ?></h3>
         <div class="form-group">
           <label>Career Title</label>
           <input type="text" name="careerTitle" required value="<?php if(isset($career['careerTitle'])){ echo $career['careerTitle'];}?>" placeholder="Item Name">
         </div>
         
         <div class="form-group">
           <label>Career Location</label>
           <input type="text" name="careerLocation" required value="<?php if(isset($career['careerLocation'])){ echo $career['careerLocation'];}?>" placeholder="Item Name">
         </div>

         <div class="form-group">
             <label>Career Type</label>
             <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="careerType" required>
             <option value="">Select</option>
             <?php $category = $this->Common_model->getall('sprw_careerstype', 'careerTypeId', 'desc');
                             foreach ($category as $categorydata) 
                             { ?>
                              <option value="<?= $categorydata->careerTypeId; ?>"
                               <?php if (isset($career['careerType'])) 
                               {
                                  if ($career['careerType'] == $categorydata->careerTypeId) 
                                  {
                                      echo "selected";
                                  }
                              } ?>><?= $categorydata->careerType; ?></option>
                                    <?php   } ?>
             </select>
         </div>


<div class="form-group col-lg-9" style="width: 100%;padding-left: 0px;" >
  <label>Career File</label>
  <input type="file" name="pic" <?php if(!isset($career['careerId'])) { ?> required  <?php  } ?>>
                                <input type="hidden" name="oldpic" value="<?php if (isset($career['careerFile'])) {
                                                                                echo $career['careerFile'];
                                                                            } ?>">
</div>

<div class="form-group col-lg-2 " style="width: 100%;">
                                <img id="blah" src="<?= base_url() ?>assets/images/imgs.png" style="max-width:90px;" alt="your image" />
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
                                <th>Career Title</th>
                                <th>Career Location</th>
                                <th>Career Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Career Title</th>
                                <th>Career Location</th>
                                <th>Career Type</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php          
      
      $filtergroup = $this->Common_model->getall('sprw_careers', 'careerId', 'desc');
                                   
                                    $sl = 0;

                                    foreach ($filtergroup as $dataa) {
                                        $sl++;
                                        
                                        $careerType = $this->Common_model->getvalue('sprw_careerstype', 'careerTypeId', $dataa->careerType, 'careerType');
                                       
                                        ?>
                        <tr>
                        <td><?= $dataa->careerTitle; ?></td>
                        <td><?= $dataa->careerLocation; ?></td>
                        <td><?= $careerType; ?></td>
                        <td><a href="<?= base_url() ?>career/editcareer/<?= $dataa->careerId; ?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a href="<?= base_url() ?>career/delete_career/<?= $dataa->careerId; ?>" ><i class="fa fa-trash"></i></a>
                                               
                                            </td>
                            </tr>
                            

                            <?php  } ?>
                            



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><script>
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

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/manage.js"></script>