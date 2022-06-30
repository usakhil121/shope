

<div class="row footer">
     <div class="col-lg-6">
       <p>Shope Admin Console - Powered by Igen</p>
     </div>
     <div class="col-lg-6 text-right">
       <p>(c) 2022</p>
     </div>
   </div>
 </div>
 </div>
 </section>
 <?php 
$msgsucccess = $this->session->flashdata('successa');

if(!empty($msgsucccess)) { ?>

<div id="snackbarerr"> <?=$msgsucccess?></div>
<script>
    $(function(){
    var x = document.getElementById("snackbarerr");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    });
</script>
<?php   unset($_SESSION['successa']); } ?>

<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #4caf50;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}
#snackbarerr {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #0b9f24;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}
#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbarerr.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/common.js"></script>
</body>
</html>