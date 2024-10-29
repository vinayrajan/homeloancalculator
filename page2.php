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
        
        <h2>Closing Cost Details</h2>
        <hr style="height:6px">       
        
        
        <div  class="row">
            <!-- loan Costs -->
            <div class="col-md-6"> 
                <div class="inverted"><b>Loan Costs</b></div>                 
                <div class="card border-light mb-8" style="max-width: 18rem;">
                    <div class="card-header">A. Origination Charges</div>
                    <div class="card-body">                      
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  <div class="card border-light mb-8" style="max-width: 18rem;">
                    <div class="card-header">B. Services You Cannot Shop For</div>
                    <div class="card-body">                      
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  <div class="card border-light mb-8" style="max-width: 18rem;">
                    <div class="card-header">C. Services You Can Shop For</div>
                    <div class="card-body">                    
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  <div class="card border-light mb-8" style="max-width: 18rem;">
                    <div class="card-header">D. TOTAL LOAN COSTS (A + B + C)</div>
                    <div class="card-body">                      
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
            </div>
            <!-- loan Costs -->

            <!-- Other terms -->
            <div class="col-md-6">                
                <div class="inverted"><b> Other Costs</b></div>
                <div  class="row">
                    <div class="col-md-8"> </div>
                    <div class="col-md-4"> </div>
                </div>                                                                 
            </div>
            <!-- Other Costs -->

        </div>
        
        
        <div class="row">&nbsp;</div>
        
        
        
        <footer id="footer" >            
            <div class="row">
            <div class="col">LOAN ESTIMATE <br>
            LFD01001-20210501</div>

            <div class="col text-center">PAGE 2 OF 3</div>

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