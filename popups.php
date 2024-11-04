<script type="text/javascript">
  // modal validation 


</script> 

<!-- PDF modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalTitle">Required for the document</h5>
        <button type="button" class="close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>    
      <div class="modal-body">
        <form role="form" id="pdfModalForm" action="<?php echo $base_url;?>/page1" method="post">        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input  required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com" value="abc@mail.com"/>            
            
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input required type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneHelpId" placeholder="mobile number" value="12345"/>            
            
        </div>
        <div class="mb-3">
            <label for="zipcode" class="form-label">Zip code</label>
            <input required type="text" class="form-control" name="zipcode" id="zipcode" aria-describedby="zipHelpId" placeholder="area zip code" value="12345"/>                        
        </div>
        <div class="modal-footer">
          <input type="hidden" name="prev" id="prev" value="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>               
        </form>
      </div>
          
    </div>
  </div>
</div>