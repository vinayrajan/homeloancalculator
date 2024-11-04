<?php
include("common.php");
include("percentage.php");
$P = new Percentage();


if($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['prev']))
{
    echo "what";
    @header('Location: '."500?error=12");
    die();
}
$email = $_POST["email"];
$phone = $_POST["phone"];
$zipcode=$_POST["zipcode"];

$prev=json_decode($_POST["prev"]);
$interestrate = $prev->interestrate;
$tenure = $prev->tenure;
$loanamount = $prev->loanamount;
$principal = $prev->principal;
$interest = $prev->interest;
$total = $prev->total;
$emi = $prev->emi;


/*

// need to remove
$interestrate="3.875";
$tenure="30";
$loanamount="150000";
$emi=958;
$principal=150000;



$email = "test@test.com";
$phone = "9848581828";
$zipcode="94587";
// need to remove
*/

$downpayment = $P->of(20, $principal);

$loan_id="HLC".$phone."Z".$zipcode."T".date("ymdhis");
$estimate_id="LFD"."0".$counter."-".date("ymd");


// calculations
$SalePrice  = $downpayment+$loanamount;
$per_diff = $P->absoluteDifferenceBetween($SalePrice,$loanamount);

/*
    MortgageInsurance
    if $downpayment is less than 20% of $SalePrice then calculate MortgageInsurance else $0
*/
if($per_diff<20){
    $MortgageInsurance1 = (($emi*10)/100);
    $MortgageInsurance = $MortgageInsurance1." (Mortgage Insurance is 10% of EMI if downpayment is less than 20% of SalePrice)";
}
else{
    $MortgageInsurance1 = 0;
    $MortgageInsurance = "0"." (downpayment is ".($per_diff)."% of SalePrice)";
}
/*
    MortgageInsurance
    if $downpayment is less than 20% of $SalePrice then calculate MortgageInsurance else $0
*/

// I think escrow is a 3rd party finance company who ensures your EMI payment.
$escrow = 0;

// end of calculations
$Estimated_Total_Monthly_Payment = $emi+$MortgageInsurance1+$escrow;
$Estimated_Total_Yearly_Payment = $Estimated_Total_Monthly_Payment * 12;
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
          .ccc{
            background-color:#ccc
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
                    <tr><td><?php echo $email;?></td> <td></td></tr>
                    <tr><td><?php echo $phone;?></td> <td></td></tr>
                    <tr><td>Zip <?php echo $zipcode;?></td> <td></td></tr>
                    <tr><td><b>PROPERTY</b></td><td>NC</td></tr>
                    <tr><td><b>SALE PRICE</b></td><td><?php echo formatDollars($SalePrice);?></td></tr>
                </table>
            </div>
            <div class="col">
                <table>
                    <tr><td><b>LOAN TERM </b> </td><td><?php echo $tenure;?>Years</td></tr>
                    <tr><td><b>PURPOSE </b> </td><td>Purchase</td></tr>
                    <tr><td><b>PRODUCT </b> </td><td>Fixed</td></tr>
                    <tr><td><b>LOAN TYPE </b> </td><td><input type="checkbox"> Conventional, <input type="checkbox"> FHA, <input type="checkbox"> VA, <input type="checkbox"> _____________ </td></tr>
                    <tr><td><b>LOAN ID # </b> </td><td>_____________</td></tr>
                    <tr><td><b>RATE LOCK</b> </td><td><input type="checkbox"> NO, <input type="checkbox"> YES,  until _____________ at _____________ </td></tr>
                </table>
                Before closing, your interest rate, points, and lender credits can change unless you lock the interest rate. All other estimated closing costs expire on <span id="lastDayOfMonth">10/30/2024</span> 17:59EDT
            </div>
        </div>
        <!-- Title block -->

        <div class="row">&nbsp;</div>

        <!-- loan terms -->
        <div id="loanterms" class="row">
            <div class="inverted col-4"><b> Loan Terms</b></div><div class="bg-light col-4"></div><div class="ccc col-4" style="padding-left: 0px !important;"><b>Can this amount increase after closing?</b></div>
            <table>
                <tr><td class="tdblr tdblb col-4"><b>Loan Amount</b></td><td class="tdblb col-4"><?php echo formatDollars($loanamount);?></td><td class="tdblb col-4">NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Interest Rate</b></td><td class="tdblb">*<?php echo $interestrate;?> % per year</td><td class="tdblb">NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Monthly Principal & Interest</b>
                    See Projected Payments below for your Estimated Total Monthly Payment
                    </td><td class="tdblb"><?php echo formatDollars($emi);?> </td><td class="tdblb">NO</td>
                </tr>
                <tr><td class="tdblr tdblb"><b>Prepayment Penalty</b></td><td class="tdblb"> N/A</td><td class="tdblb ccc"><b>Does the loan have these features?</b><br>NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Balloon Payment</b></td><td class="tdblb">N/A</td><td class="tdblb">NO</td></tr>
            </table>
        </div>
        <!-- loan terms -->
        <br/>
        <!-- Projected Payments -->
        <div id="projectedpayments" class="row">
            <div class="inverted col-4"><b> Projected Payments</b></div>
            <table class="table">
                <thead class="ccc">
                    <tr><td class="col-4"><b>Payment Calculation</b></td><td><b>1-Month </b></td><td><b>1-Years</b></td></tr>
                </thead>
                <tbody>
                    <tr><td><b>Principal & Interest</b></td><td><?php echo formatDollars($emi);?></td><td><?php echo formatDollars($emi*12);?></td></tr>
                    <tr><td><b> Mortgage Insurance</b></td><td>+<?php echo formatDollars($MortgageInsurance1); ?></td><td>+<?php echo formatDollars($MortgageInsurance1*12); ?></td></tr>
                    <tr><td><b> Estimated Escrow<br><i>Amount can increase over time</i></b></td><td>+<?php echo formatDollars($escrow);?></td><td>+<?php echo formatDollars($escrow*12);?></td></tr>
                </tbody>
                <tfoot>
                    <tr><td><b>Estimated Total<br>Monthly Payment</b></td><td><?php echo formatDollars($Estimated_Total_Monthly_Payment);?></td><td><?php echo formatDollars($Estimated_Total_Yearly_Payment);?></td></tr>
                </tfoot>
            </table>
            <table>
                <tr>
                    <td class="col-3"><b>Estimated Taxes, Insurance <br>& Assessments</b><br><i>Amount can increase over time</i></td>
                    <td class="col-3"><?php echo formatDollars($emi);?> <br> a month</td>
                    <td class="col-3"><b>This estimate includes</b><br>
                        <input type="checkbox"> Property Taxes<br>
                        <input type="checkbox"> Homeowner’s Insurance<br>
                        <input type="checkbox"> Other:
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
            <?php echo $estimate_id;?></div>

            <div class="col text-center">PAGE 1 OF 3</div>

            <div class="col text-end">LOAN ID # <?php echo $loan_id;?></div>
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
  </body>
</html>