<?php
include('common.php');
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="<?php echo $asset_path;?>/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  

    <title>Home loan calculator</title>
  </head>
  <body>
    <h3 style="text-align: center;">Home loan calculator</h3>

<main>      
  <div class="px-4 py-5 my-5 text-center">      
    <h1 class="display-5 fw-bold">500</h1>
    <div class="col-lg-6 mx-auto">      
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error - <?php echo $error.message ?></h4> <hr>
          <?php if ($verbose_errors) { ?>
            <code><?php echo $error.stack ?></code>
          <?php } else { ?>
            <p>An error occurred!</p>
          <?php } ?>
        
      </div>

      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="<?php echo $base_url ?>" class="btn btn-primary btn-lg px-4 gap-3">Homepage</a>
          <a href="<?php echo $base_url ?>" class="btn btn-outline-secondary btn-lg px-4">Back</a>
      </div>
    </div>
  </div>


  <div class="b-example-divider"></div>
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">        
    <span class="text-muted">Date - <?php echo date('m/j/Y H:i:s');?>|| LWD - <?php echo lastDayOfMonth(); ?></span>
    <span style="text-align:right" class="text-end"><a target="_blank" href="<?php echo $base_url;?>/conditions.php">Terms and conditons</a></span>
  </div>          
</footer>
</body>
</html>
