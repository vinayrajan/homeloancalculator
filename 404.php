<?php
include('common.php');
$back_url= $base_url;
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
      <h1 class="display-5 fw-bold">404</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Cannot find the page you are looking for <?php echo $url ?></p>
        <p>
          <?php
        if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
        {
            $refuri = parse_url($_SERVER['HTTP_REFERER']); // use the parse_url() function to create an array containing information about the domain   
            $back_url =  $refuri ;        
            if($refuri['host'] == $base_url){
              $back_url =  $base_url ;        
            }
            else{
              $back_url =  "http://google.com" ;        
            }
        }
        else{         
          $back_url =  "http://google.com" ; 
        }
                  
        ?>
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="<?php echo $base_url; ?>" class="btn btn-primary btn-lg px-4 gap-3">Homepage</a>
          <a href="<?php echo $back_url; ?>" class="btn btn-outline-secondary btn-lg px-4">Back</a>
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