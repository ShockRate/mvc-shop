<br>
<!-- bs-example-modal-sm -->
<div class="modal fade" tabindex="-1" id="windowsill">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        
        <h4 class="modal-title">Codes &amp; Company</h4>
      </div>
      <div class="modal-body">
     
        <p><input type="text" id="sillIndex" name="sillIndex"></p>
         <p><input type="text" id="sillsImageSrc" name="sillsImageSrc"></p>
         
        
          

        <div class="sills-container">
          <div class="row row-eq-height">
           
           <div class="col-xs-3 col-lg-3">
            <div class="vertical-center"> 
                  <label class="checkbox-inline">
                    <p><input type="text" class="input-sm" id = "inputLeft" style="width: 50px" /></p>
                    <input type="checkbox" id="checkLeft" onclick="changePic()" checked>L</label>
             </div>     
            </div>  

            
            <div class="col-xs-9 col-lg-9 text-center">
               
              <label class="checkbox-inline">
                <p><input type="text" class="input-sm" id = "inputUp" style="width: 50px"/></p>
                <input type="checkbox" id="checkUp" onclick="changePic()" checked>U</label>
                <br>
              <img class="img-responsive" id="sillsImage" src="images/shifts/UDLR.png">
              <br>
              <label class="checkbox-inline">
                <p><input type="text" class="input-sm" id = "inputDown" style="width: 50px"/></p>
                <input type="checkbox" id="checkDown" onclick="changePic()" checked>D</label>
            </div>
            

             <div class="col-xs-3 col-lg-3 text-left">
              <div class="vertical-center">
                <label class="checkbox-inline">
                  <p><input type="text" class="input-sm" id = "inputRight" style="width: 50px"/></p>
                  <input type="checkbox" id="checkRight" onclick="changePic()" checked>R</label>
              </div>
            </div>          
          </div>
        </div> <!--container-->
        
      </div> <!-- modal-body -->
          <div class="modal-footer">      
            <button type="button" class="btn btn-default" id="changeSillsbutton" data-dismiss="modal">Change</button>     
            <button type="button" class="btn btn-default" id="closeSillsModal" data-dismiss="modal">Close</button>           
          </div>
      </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
<br>

<span id="myText" name ="productName" style="text-align: left;"></span>
<!-- 
class="col-md-6" -->