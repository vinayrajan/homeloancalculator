<!-- Footer -->
<div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">Date - <?php echo date('m/j/Y H:i:s');?> | LWD - <?php echo lastDayOfMonth(); ?></p>

            <span class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                
            </span>

            <ul class="nav col-md-4 justify-content-end">
               <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li> -->
                <li class="nav-item"><a href="<?php echo $base_url;?>/index" class="nav-link px-2 text-muted">Calculator</a></b></li>
                <li class="nav-item"><a target="_blank" href="<?php echo $base_url;?>/conditions" class="nav-link px-2 text-muted">Terms and conditons</a></li>
                <li class="nav-item"><a target="_blank" href="<?php echo $base_url;?>/privacy" class="nav-link px-2 text-muted">Privacy policy</a></li>
                <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Faq</a></li> -->
                <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li> -->
            </ul>
        </footer>
</div>


<script src="<?php echo $asset_path;?>/js/jquery.min.js" ></script>
<script src="<?php echo $asset_path;?>/js/popper.min.js"></script>
<script src="<?php echo $asset_path;?>/js/bootstrap.min.js"></script>        
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>        
<script src="<?php echo $asset_path;?>/js/jquery.validate.min.js"></script> 
<script src="<?php echo $asset_path;?>/js/additional-methods.min.js"></script>     
<script src="<?php echo $asset_path;?>/js/DOMPurify.min.js"></script>   
<script src="<?php echo $asset_path;?>/js/custom.js"></script>        