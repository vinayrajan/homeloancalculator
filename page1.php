<?php

/*

$email = $_POST["email"];
$phone = $_POST["phone"];
$zipcode=$_POST["zipcode"];

$prev=json_decode($_POST["prev"]);
$rateofintrest = $prev->interestrate;
$tenure = $prev->tenure;
$loanamount = $prev->loanamount;
$principal = $prev->principal;
$interest = $prev->interest;
$total = $prev->total;

*/

$email = "test@test.com";
$phone = "9848581828";
$zipcode="94587";

$interestrate="6.6";
$tenure="30";
$loanamount="150000";
$emi=958;
$principal=150000;
$interest=194876;
$total=344876;
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src = "assets/js/androidjs.js" ></script>
    <style>
        body{
            font-size: small;            
        }        
       
        hr {
            display: block;
            opacity:1;  
            color:black;                                              
            padding:0px;
            margin:2px;
          }          
        
          .tdblb{
            border-bottom:2px solid #dee2e6;;
          }
          .tdblr{
            border-right:2px solid #dee2e6;;
          }

        
          .inverted{background-color: black;color:white;  border-top-left-radius: .5rem !important; border-top-right-radius: .5rem !important;}          
    </style>
    <title>Home loan calculator</title>
  </head>
  <body>
    
    <div class="container">
        <header class="row">
            <div class="col">
                C4D Mortgage Company LLC #151261<br>
                100 East Big Beaver Road, Suite 930 A, Troy, MI, 48083
            </div>
            <div class="col text-end">
                <br>Save this Loan Estimate to compare with your Closing Disclosure.
            </div>
        </header> 
        
        <hr style="height:6px">       
        
        <!-- Title block -->
        <div id="titleblock"  class="row">
            <div class="col">
                <h2>Loan Estimate</h2>
                <table>
                    <tr><td><b>DATE ISSUED</b> </td><td><span id="today"></span></td></tr>
                    <tr><td><b>APPLICANTS</b></td> <td>Self</td></tr>
                    <tr><td>&nbsp;</td> <td></td></tr>
                    <tr><td>&nbsp;</td> <td></td></tr>
                    <tr><td>&nbsp;</td> <td></td></tr>
                    <tr><td><b>PROPERTY</b></td><td>NC</td></tr>
                    <tr><td><b>SALE PRICE</b></td><td></td></tr>
                </table>                                                                
            </div>
            <div class="col">
                <table>
                    <tr><td><b>LOAN TERM </b> </td><td>25.6 years</td></tr>
                    <tr><td><b>PURPOSE </b> </td><td>Purchase</td></tr>
                    <tr><td><b>PRODUCT </b> </td><td>Fixed</td></tr>
                    <tr><td><b>LOAN TYPE </b> </td><td><i class="bi bi-app"></i> Conventional, <i class="bi bi-app"></i> FHA, <i class="bi bi-app"></i> VA, <i class="bi bi-app"></i> _____________ </td></tr>
                    <tr><td><b>LOAN ID # </b> </td><td>_____________</td></tr>
                    <tr><td><b>RATE LOCK</b> </td><td><i class="bi bi-app"></i> NO, <i class="bi bi-app"></i> YES, <i class="bi bi-app"></i> until _____________ at _____________ </td></tr>                    
                </table>
                Before closing, your interest rate, points, and lender credits can change unless you lock the interest rate. All other estimated closing costs expire on <span id="lastDayOfMonth">10/30/2024</span> 11:59EDT
            </div>
        </div>
        <!-- Title block -->
        
        <div class="row">&nbsp;</div>
        
        <!-- loan terms -->
        <div id="loanterms" class="row">  
            <div class="inverted col-4"><b> Loan Terms</b></div><div class="bg-light col-4"></div><div class="bg-light col-4" style="padding-left: 0px !important;"><b>Can this amount increase after closing?</b></div>          
            <table>                                
                <tr><td class="tdblr tdblb col-4"><b>Loan Amount</b></td><td class="tdblb col-4">$<?php echo $loanamount; ?></td><td class="tdblb col-4">NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Interest Rate</b></td><td class="tdblb">* <?php echo $interestrate;?></td><td class="tdblb">NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Monthly Principal & Interest</b>
                    See Projected Payments below for your Estimated Total Monthly Payment
                    </td><td class="tdblb">$<?php echo $total;?> </td><td class="tdblb">NO</td>
                </tr>
                <tr><td class="tdblr tdblb"><b>Prepayment Penalty</b></td><td class="tdblb"> &nbsp;</td><td class="tdblb"><b>Does the loan have these features?</b><br>NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Balloon Payment</b></td><td class="tdblb"></td><td class="tdblb">NO</td></tr>                
            </table>
        </div>        
        <!-- loan terms -->
        <br/>                
        <!-- Projected Payments -->         
        <div id="projectedpayments" class="row">             
            <div class="inverted col-4"><b> Projected Payments</b></div>
            <table class="table">
                <thead>
                    <tr><td class="col-4"><b>Payment Calculation</b></td><td><b>Years</b></td><td><b>Years</b></td></tr>    
                </thead>
                <tbody>
                    <tr><td><b>Principal & Interest</b></td><td>$</td><td>$</td></tr>
                    <tr><td><b> Mortgage Insurance</b></td><td>+</td><td>+</td></tr>
                    <tr><td><b> Estimated Escrow<br><i>Amount can increase over time</i></b></td><td>+</td><td>+</td></tr>
                </tbody>  
                <tfoot>
                    <tr><td><b>Estimated Total<br>Monthly Payment</b></td><td>$</td><td>$</td></tr>
                </tfoot>                 
            </table>
            <table>
                <tr> 
                    <td class="col-3"><b>Estimated Taxes, Insurance <br>& Assessments</b><br><i>Amount can increase over time</i></td>
                    <td class="col-3">$0 <br> a month</td>
                    <td class="col-3"><b>This estimate includes</b><br>
                        <i class="bi bi-app"></i>Property Taxes<br>
                        <i class="bi bi-app"></i>Homeowner’s Insurance<br>
                        <i class="bi bi-app"></i>Other: 
                    </td>
                    <td class="col-3"><b>In escrow?</b><br>Yes<br>Yes</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2"><i>See Section G on page 2 for escrowed property costs. You must pay for other 
                        property costs separately</i></td>
                </tr>
            </table>
        </div>        
        <!-- Projected Payments -->
        <br/>                
        <!-- Costs at Closing -->
        <div id="costsatclosing" class="row">             
            <div class="inverted col-4"><b>  Costs at Closing</b></div>
            <table class="table">                                
                <tr><td class="col-3"><b> Estimated Closing Costs</b></td>
                    <td class="col-3">$</td>
                    <td class="col-6"> Includes $ _____________ in Loan Costs +$ _____________  in Other Costs – $ _____________ <br> in Lender Credits. <i>See page 2 for details</i>.</td>
                </tr>
                <tr><td><b>  Estimated Cash to Close</b></td><td>$0</td><td>Includes Closing Costs. <i>See Calculating Cash to Close on page 2 for details</i>.</td></tr>                                                    
            </table>
            
        </div>  
        <!-- Costs at Closing -->
        
        <footer id="footer" >
            <div class="row"><div class="text-center">Visit <b><a class="text-secondary" target="_blank" href="http://www.consumerfinance.gov/mortgage-estimate">www.consumerfinance.gov/mortgage-estimate</a></b> for general information and tools.</div></div>
            <div class="row">
            <div class="col">LOAN ESTIMATE <br>
            LFD01001-20210501</div>

            <div class="col text-center">PAGE 1 OF 3</div>

            <div class="col text-end">LOAN ID # 13273993</div>
            </div>
        </footer>        
        
    </div>

    <script src="assets/js/jquery.min.js" ></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>        
        
    <script>        
    jQuery(function( $ ) {
        'use strict';
        var today = new Date();            
        $("#today").text(today.toLocaleDateString())
        var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth()+1, 0);        
        $("#lastDayOfMonth").text(lastDayOfMonth.toLocaleDateString())
        
        
    })
    </script>   
    
    <script>
      console.log(app);
      app.toast.show("nice it is working fine")
    </script>
    
  </body>
</html>