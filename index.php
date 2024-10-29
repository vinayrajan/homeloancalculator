<?php
include('common.php');

$loan_amount = get_loan_settings("loan_amount") ;
$tenure = get_loan_settings("tenure");
$interest_rate = get_loan_settings("interest_rate");

?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="<?php echo $asset_path;?>/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://www.gstatic.com/" crossorigin />

    <title>Home loan calculator</title>
  </head>
  <body>
    <h3 style="text-align: center;">Home loan calculator</h3>

    <div class="container">
        <div class="row">
            <div class="col-6 bg-light p-3 border">
                <!-- optin -->
                <div class="bd-example" style="width:50%;margin:0 auto;">
                    <form class="row g-3 needs-validation" id="homeloanoptin" novalidate>
                      <div class="mb-3 has-validation">
                        <label for="loanamount" class="form-label">Loan Amount $</label>
                        <input type="input" class="form-control" id="loanamount" aria-describedby="loanamounthelp" value="<?php echo $loan_amount; ?>" required>
                        <div id="loanamounthelp" class="form-text">In United states dollars example 342400 for $342,400</div>
                        <div class="invalid-feedback">
                          Please enter a loan amount in USD
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="tenure" class="form-label">Tenure(<span id="tenureval"><?php echo $tenure; ?></span>years)</label>          
                        <input type="range" id="tenure" data-plugin="range-slider" class="form-range" min="1" max="40" step="0.1" value="<?php echo $tenure; ?>" />            
                      </div>
                      
                      <div class="mb-3">            
                        <label for="interestrate" class="form-label">Interest Rate (<span id="interestrateval"><?php echo $interest_rate; ?></span>% P.A.)</label>         
                        <input type="range" id="interestrate" data-plugin="range-slider" class="form-range" min="5" max="25" step="0.1" value="<?php echo $interest_rate; ?>" />          
                      </div>                        
                      <button id="calc" type="button" class="btn btn-primary">Submit</button>
                    </form>
                  </div>

            </div>
            <!-- result -->
            <div class="col-6 bg-light p-3 border">
              <div class="row alert border border-primary">
                <div class="col-6 text-start">Principal Amount $<span id="principle">0</span></div>
                <div class="col-6 text-end">Interest Amount $<span id="interest">0</span></div><br>
              
                <div class="col-6 text-start">Monthly Home Loan EMI $<span id="emi">0</span></div>
                <div class="col-6 text-end">Total Amount Payable $<span id="total">0</span></div>
              </div>
              <div class="row">              
                                
                  <div class="text-muted" id="piechart" style="width: 100%; height: 300px; display:none">Pie chart loading
                    <div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div>
                  </div>                                                                                          
              </div>
              <div class="row">
                  <a id="pdfbutton" style="display:none" href="#" class="button list-group-item list-group-item-action text-center" data-toggle="modal" data-target="#pdfModal">
                    <i class="bi bi-filetype-pdf" style="font-size: 2rem; color: cornflowerblue;"></i> Download 
                  </a>                                   
              </div>                                
            </div>         
            <!-- result -->   
        </div>        
        <div class="row" id="emitable" style="max-height: 300px;">&nbsp;</div>        
        
    </div>
    <footer class="footer mt-auto py-3 bg-light">
      <div class="container">        
        <span class="text-muted">Date - <?php echo date('m/j/Y H:i:s');?>|| LWD - <?php echo lastDayOfMonth(); ?></span>
        <span style="text-align:right" class="text-end"><a target="_blank" href="<?php echo $base_url;?>/conditions.php">Terms and conditons</a></span>
      </div>          
    </footer>              
    

    <?php include("popups.php")?>


    <script src="<?php echo $asset_path;?>/js/jquery.min.js" ></script>
    <script src="<?php echo $asset_path;?>/js/popper.min.js"></script>
    <script src="<?php echo $asset_path;?>/js/bootstrap.min.js"></script>        
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>        
    <script src="<?php echo $asset_path;?>/js/jquery.validate.min.js"></script> 
    <script src="<?php echo $asset_path;?>/js/additional-methods.min.js"></script>     
    <script src="<?php echo $asset_path;?>/js/custom.js"></script>        
    <script src="<?php echo $asset_path;?>/js/DOMPurify.min.js"></script>   
  </body>
</html>