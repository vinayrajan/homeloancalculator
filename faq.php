<!doctype html>
<html lang="en">
  <head>
  <?php
    include('common.php');
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="<?php echo $asset_path;?>/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <style>
    body{
        background: rgb(229,229,229);        
        background: radial-gradient(circle, rgba(229,229,229,1) 0%, rgba(71,172,214,1) 63%, rgba(0,34,119,0.7959558823529411) 100%); 
    }
     .prow { 
            font-family: Arial, sans-serif;            
            font-size:.875em;
            margin-bottom:1rem;

            -webkit-touch-callout: none;-webkit-user-select: none;
            -khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;
            user-select: none;
        } 
    ol{padding-left: 32px !important;margin-bottom: 0px !important;}
    </style>
   
    <title>Home loan calculator</title>
  </head>

  <body>
    <div >
    <h3 style="text-align: center;">Home loan calculator</h3>
    <h4 style="text-align: center;">Privacy policy for a home loan </h4>
    </div>
    <div class="container-sm">
    <div class="accordion w-100" id="basicAccordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button data-mdb-button-init  data-mdb-collapse-init class="accordion-button collapsed" type="button"
        data-mdb-target="#basicAccordionCollapseOne" aria-expanded="false" aria-controls="collapseOne">
        Question #1
      </button>
    </h2>
    <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
      data-mdb-parent="#basicAccordion" style="">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. It's also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button data-mdb-button-init  data-mdb-collapse-init class="accordion-button collapsed" type="button"
        data-mdb-target="#basicAccordionCollapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Question #2
      </button>
    </h2>
    <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
      data-mdb-parent="#basicAccordion" style="">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. It's also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button data-mdb-button-init  data-mdb-collapse-init class="accordion-button collapsed" type="button"
        data-mdb-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
        Question #3
      </button>
    </h2>
    <div id="basicAccordionCollapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
      data-mdb-parent="#basicAccordion" style="">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default,
        until the collapse plugin adds the appropriate classes that we use to style each
        element. These classes control the overall appearance, as well as the showing and
        hiding via CSS transitions. You can modify any of this with custom CSS or overriding
        our default variables. It's also worth noting that just about any HTML can go within
        the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>

        
            <!-- repeat -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button data-mdb-button-init  data-mdb-collapse-init class="accordion-button collapsed" type="button"
                        data-mdb-target="#basicAccordionCollapseOne" aria-expanded="false" aria-controls="collapseOne">
                        balloon payment
                    </button>
                </h2>
                <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-mdb-parent="#basicAccordion" style="">
                    <div class="accordion-body">
                        A balloon payment is a large sum of money that is paid at the end of a loan term, in addition to the regular monthly payments <br>A loan with a balloon payment is also called a partially amortized loan. This is different from a fully amortized loan, where the loan is paid back in equal amounts over a fixed number of payments        
                    </div>
                </div>
            </div>
            <!-- repeat -->
        
        </div>

</div>
    <?php include("footer.php");?>            
                        
  </body>
</html>