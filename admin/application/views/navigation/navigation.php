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
            <span class="dashboard_toggle"><i class="fa fa-bars"></i>Navigation</span>
        </div>
        <div class="col-lg-6 text-right">
           
        </div>
    </div>

    <div class="row sortable">

        <div class="col-lg-6">
         <div class="row formboard">
           <div class="col-lg-12">
           <form class="fr_form modes" action="<?php echo site_url('navigation/insertupdate_navigation'); ?>" method="post" enctype="multipart/form-data" >
           <input type="hidden"  name="navId" value="<?php if(isset($navigation['navId'])){ echo $navigation['navId'];}?>" >
           <h3><?= $headding; ?></h3>
           <div class="form-group">
           <label>Nav Name</label>
           <input type="text" name="navName" required value="<?php if(isset($navigation['navName'])){ echo $navigation['navName'];}?>" placeholder="Item Name">
         </div>
         
         <div class="form-group">
             <label>parent</label>
             <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="parent" required>
             <option value="">Select</option>
             <option value="0" <?php if (isset($navigation['parent'])) {
                  if ($navigation['parent'] == 0) { echo "selected"; }  } ?>>Main Menu</option>
             <?php $category = $this->Common_model->getall('shope_navigation', 'navId', 'desc');
                                     foreach ($category as $categorydata) { 
                                        if (isset($navigation['navId'])) {
                                            if($navigation['navId'] != $categorydata->navId){ ?>
                                        <option value="<?= $categorydata->navId; ?>" <?php if (isset($navigation['parent'])) {
                                                                                                if ($navigation['parent'] == $categorydata->navId) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                            } ?>><?= $categorydata->navName; ?></option>
                                    <?php   }  }else{ ?>
                                        <option value="<?= $categorydata->navId; ?>" <?php if (isset($navigation['parent'])) {
                                                                                                if ($navigation['parent'] == $categorydata->navId) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                            } ?>><?= $categorydata->navName; ?></option>
                                        <?php  } } ?>
             </select>
         </div>
         <div class="form-group">
             <label>Page</label>
             <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="page">
             <option value="">Select</option>
             <?php $categoryp = $this->Common_model->getall('shope_pages', 'pageId', 'desc');
                                     foreach ($categoryp as $categorydatap) { ?>
                                        <option value="<?= $categorydatap->pageId; ?>" <?php if (isset($navigation['page'])) {
                                                                                                if ($navigation['page'] == $categorydatap->pageId) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                            } ?>><?= $categorydatap->pageName; ?></option>
                                    <?php   } ?>
             </select>
         </div>

         <div class="form-group">
           <label>Link</label>
           <input type="text" name="link" value="<?php if(isset($navigation['link'])){ echo $navigation['link'];}?>" placeholder="Item Name">
         </div>
         


         <div class="form-group">
           <label>Sort Order</label>
           <input type="text" name="sortOrder" value="<?php if(isset($navigation['sortOrder'])){ echo $navigation['sortOrder'];}?>" placeholder="Item Name">
         </div>

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
                                <th>Nav Name</th>
                                <th>Parent</th>
                                <th>Sort Order</th> 
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Nav Name</th>
                                <th>Parent</th>
                                <th>Sort Order</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php          
      
      $filtergroup = $this->Common_model->getall('shope_navigation', 'navId', 'desc');
                                   
                                    $sl = 0;

                                    foreach ($filtergroup as $dataa) {
                                        $sl++;
                                        
                                        $parent = $this->Common_model->getvalue('shope_navigation', 'navId', $dataa->parent, 'navName');
                                       
                                        ?>
                        <tr>
                        <td><?= $dataa->navName; ?></td>
                        <td><?= $parent; ?></td>
                        <td><?= $dataa->sortOrder; ?></td>
                        <td><a href="<?= base_url() ?>navigation/editnavigation/<?= $dataa->navId; ?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a href="<?= base_url() ?>navigation/delete_navigation/<?= $dataa->navId; ?>" ><i class="fa fa-trash"></i></a>
                                               
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