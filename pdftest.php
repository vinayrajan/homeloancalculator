<?php 
ob_start();
require __DIR__ . '/vendor/autoload.php';
include("common.php");
include("percentage.php");
$P = new Percentage();


/*
// need to use once testing is done
if($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['prev']))
{    
    housekeeping(500,12); //request method not expected    
}
$csrf_token = verifyCSRFToken((isset($_POST["csrf_token"]) && $_POST["csrf_token"]!=="")?$_POST["csrf_token"]:$_GET["csrf_token"]);
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
// need to use once testing is done
*/




// need to remove once testing is done

// - security check - 
$csrf_token = generateCSRFToken();;
verifyCSRFToken($csrf_token);


$interestrate="3.875";
$tenure="30";
$loanamount="150000";
$emi=958;
$principal=150000;

$email = "test@test.com";
$phone = "9848581828";
$zipcode="94587";
// need to remove once testing is done


$downpayment = $P->of(20, $principal);

$loan_id="HLC".$phone."Z".$zipcode."T".date("ymdhis").'<br>'.$csrf_token;
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


class MYPDF extends TCPDF {            
    public function Header() {                        
        $tbl = <<<EOD
        <table border="0" cellpadding="1" cellspacing="1" width="600">
        <tr>
            <td width="40%">C4D Mortgage Company LLC #151261</td>
            <td></td>
            <td width="60%"></td>
        </tr>
        <tr>
            <td>100 East Big Beaver Road, Suite 930 A, Troy, MI, 48083</td>
            <td></td>
            <td>Save this Loan Estimate to compare with your Closing Disclosure.</td>
        </tr>
        </table>
        EOD;
        $this->SetX(0);$this->SetY(10);                  
        $this->writeHTML( $tbl, true, false, false, false, '');
        $style = array('width' => 1.0, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(10, 30, 290, 30, $style);                
    }

    // Page footer
    public function Footer() {                                    
        $this->SetX(10);$this->SetY(-30);    
        $this->writeHTML( $this->CustomHeaderText, true, false, false, false, '');                        
    }
}


$interestrate="3.875";
$tenure="30";
$loanamount="150000";
$emi=958;
$principal=150000;

$email = "test@test.com";
$phone = "9848581828";
$zipcode="94587";
$downpayment = $P->of(20, $principal);

$loan_id="HLC".$phone."Z".$zipcode."T".date("ymdhis");
$estimate_id="LFD"."0"."-".date("ymd");

$certificate = 'file://data/cert/tcpdf.crt';            
    // set additional information
    $info = array(
    'Name' => 'Homeloan Estimate',
    'Location' => '',
    'Reason' => 'Mortgage estimate',
    'ContactInfo' => 'Vinay Kumar Rajan',
    );
    
    $privkey= null;   
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(300, 300), true, 'UTF-8', false, true);


$pdf_data = $Loan_Estimate = $Loan_Terms = $Projected_Payments = $Costs_at_Closing = "";
$checkbox="<img src='/images/checkbox.png' width='50' height='50'>";
$checked_checkbox="<img src='".$asset_path."/images/checked.png' width='50' height='50'>";

$Loan_Estimate = '
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="20%"><h2>Loan Estimate</h2></td>
        <td width="30%"></td>
        <td width="20%"><b>LOAN TERM</b></td>
        <td width="30%">'.$tenure.' Years</td>
    </tr>
    <tr>
        <td><b>DATE ISSUED</b> </td>
        <td><span id="today">'.date('m/d/Y').'</span></td>
        <td><b>PURPOSE</b></td>
        <td>Purchase</td>
    </tr>
    <tr><td><b>APPLICANTS</b></td> <td>Self</td><td><b>PRODUCT </b> </td><td>Fixed</td></tr>
    <tr><td>'.$email.'</td> <td></td><td><b>LOAN TYPE </b> </td><td>'.$checkbox.' Conventional, '.$checkbox.' FHA, '.$checkbox.' VA, '.$checkbox.' _____________ </td></tr>
    <tr><td>'.$phone.'</td> <td></td><td><b>LOAN ID # </b> </td><td>_____________</td></tr>
    <tr><td>Zip '.$zipcode.'</td> <td></td><td><b>RATE LOCK</b> </td><td>'.$checkbox.' NO, '.$checkbox.' YES,  until _____________ at _____________ </td></tr>
    <tr><td><b>PROPERTY</b></td><td>NC</td><td></td><td></td>
    <tr><td><b>SALE PRICE</b></td><td>'.formatDollars($SalePrice).'</td><td></td><td></td></tr>

</table>';
$Loan_Terms .='<div id="loanterms" class="row">
            <div class="inverted col-4"><b> Loan Terms</b></div><div class="bg-light col-4"></div><div class="ccc col-4" style="padding-left: 0px !important;"><b>Can this amount increase after closing?</b></div>
            <table>
                <tr><td class="tdblr tdblb col-4"><b>Loan Amount</b></td><td class="tdblb col-4">'.formatDollars($loanamount).'</td><td class="tdblb col-4">NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Interest Rate</b></td><td class="tdblb">*'.$interestrate.' % per year</td><td class="tdblb">NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Monthly Principal & Interest</b>
                    See Projected Payments below for your Estimated Total Monthly Payment
                    </td><td class="tdblb">'.formatDollars($emi).' </td><td class="tdblb">NO</td>
                </tr>
                <tr><td class="tdblr tdblb"><b>Prepayment Penalty</b></td><td class="tdblb"> N/A</td><td class="tdblb ccc"><b>Does the loan have these features?</b><br>NO</td></tr>
                <tr><td class="tdblr tdblb"><b>Balloon Payment</b></td><td class="tdblb">N/A</td><td class="tdblb">NO</td></tr>
            </table>
        </div>';
$pdf_data = $Loan_Estimate.$Loan_Terms.$Projected_Payments.$Costs_at_Closing;
/* PDF library */
//include("libraries/TCPDF-main/tcpdf.php");

    

    //$pdf->setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';            
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    $pdf->setLanguageArray($lg);
    
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Vinay Kumar Rajan');                        
    $PDF_MARGIN_TOP=15;
    $PDF_MARGIN_LEFT=10;    
    $PDF_MARGIN_RIGHT=10;

    $PDF_MARGIN_FOOTER = 0;
    $PDF_MARGIN_BOTTOM =0;
    
    $pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP , $PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin($PDF_MARGIN_RIGHT);
    $pdf->SetFooterMargin($PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, $PDF_MARGIN_BOTTOM);
    $pdf->CustomHeaderText  = '<table border="0" cellpadding="1" cellspacing="1" nobr="true">
        <tr>
        <th colspan="3" align="center">Visit <b>www.consumerfinance.gov/mortgage-estimate</b> for general information and tools.</th>
        </tr>
        <tr>
        <td width="30%">LOAN ESTIMATE</td>
        <td width="30%"></td>
        <td width="40%">LOAN ID #'.$loan_id.'</td>
        </tr>
        <tr>
        <td>'.$estimate_id.'</td>
        <td align="center">PAGE '.$pdf->getAliasNumPage() .' of '. $pdf->getAliasNbPages().'</td>
        <td>43c2825e0077da8f906e435ff98e759aaa00242c3244d536e1ac8f6b7bedd48e</td>
        </tr> 
        </table>';        
    
    
    $pdf->AddPage("L");
    $pdf->SetFont('dejavusans', '', 10);      
    $pdf->setXY(10,32);    
    $pdf->writeHTML($pdf_data, true, false, true, false, '');      
    
    
    

    ob_end_clean();
    //$pdf->Output("libraries/".$estimate_id.'.pdf', 'I');   
    $pdf->Output(__DIR__ . '/mytestfile.pdf', 'FI')       
/* PDF library */
?>
