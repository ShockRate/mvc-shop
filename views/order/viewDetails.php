<div class="modal fade" id="itemDetailsModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="mySmallModalLabel">Πρόσθετα στοιχεία</h4>
      </div><!--/.modal-header-->

        <div class="modal-body">
               
        <div id="detailsMSG">
 
        </div>                   
<div class="details-container">
    <div class="details-dimensions">
                

                

                <div class="block">
                  <label class="input-label">ΤΕΜΑΧΙΑ</label>
                   <input type="text" class="input-sm" id="pieces"/>
                </div>
               <br>
                <div class="block">
                  <label class="input-label">ΦΑΡΔΟΣ</label>
                  <input type="text" class="input-sm" id="detailsWidth"/>
                </div>

                <div class="block">
                  <label class="input-label">ΥΨΟΣ</label>
                  <input type="text" class="input-sm" id="detailsHeight"/>
                </div> 
               <br>
                <div class="block">
                  <label class="input-label">ΚΑΘΑΡΟ ΦΑΡΔΟΣ</label>
                  <input type="text" class="input-sm" id="detailsClearWidth"/>
                </div>

                <div class="block">
                  <label class="input-label">ΚΑΘΑΡΟ ΥΨΟΣ</label>
                  <input type="text" class="input-sm" id="detailsClearHeight"/>
                </div>
  </div>
<div class="details-image">
                  
                <div>
                  <div class="block">
                    <label class="input-label">ΤΥΠΟΣ</label>              
                    <p id="type"></p>
                  </div> 
                   <div id="dimensionsSet">                                  
                   </div>                  
                  <br>            
                </div> 
                 
</div>
<div class="details-extras">
  <p><input type="text" id="windowIndex" name="sillIndex"></p>
           
           
           <div class="block">
             <label>ΨΕΥΤΟΚΑΣΑ</label>
             <select class="form-control" id="profiles" name="<?php echo $worksheet->getCellByColumnAndRow(5,'1')->getValue();?>">
               <?php for ($row = 2; $row <= $worksheet->getHighestRow('E'); $row++) { ?>
                 <option value="<?php echo $worksheet->getCellByColumnAndRow(5,$row)->getValue();?>"><?php echo $worksheet->getCellByColumnAndRow(5,$row)->getValue();?></option>
               <?php } ?>
             </select>
           </div>
           

           <p>
           <div class="block">
             <label>ΡΟΛΑ</label>
             <select class="form-control" id="shutters" name="<?php echo $worksheet->getCellByColumnAndRow(6,'1')->getValue();?>" onchange="showExtras(this.value)">
               <?php for ($row = 2; $row <= $worksheet->getHighestRow('F'); $row++) { ?>
                 <option value="<?php echo $worksheet->getCellByColumnAndRow(6,$row)->getValue();?>"><?php echo $worksheet->getCellByColumnAndRow(6,$row)->getValue();?></option>
               <?php } ?>
             </select>
           </div>
           </p>
           <div id ="extra-parts">
            <div class="block">
              <label>ΦΙΛΑΡΑΚΙ</label>
              <select class="form-control" id="slats" name="<?php echo $worksheet->getCellByColumnAndRow(7,'1')->getValue();?>">
                <?php for ($row = 2; $row <= $worksheet->getHighestRow('G'); $row++) { ?>
                  <option value="<?php echo $worksheet->getCellByColumnAndRow(7,$row)->getValue();?>"><?php echo $worksheet->getCellByColumnAndRow(7,$row)->getValue();?></option>
                <?php } ?>
              </select>
            </div>
            <div class="block">
              <label>ΚΙΝΗΣΗ ΡΟΛΟΥ</label>
              <select class="form-control" id="mechanism" name="<?php echo $worksheet->getCellByColumnAndRow(8,'1')->getValue();?>">
                <?php for ($row = 2; $row <= $worksheet->getHighestRow('H'); $row++) { ?>
                  <option value="<?php echo $worksheet->getCellByColumnAndRow(8,$row)->getValue();?>"><?php echo $worksheet->getCellByColumnAndRow(8,$row)->getValue();?></option>
                <?php } ?>
              </select>
            </div>
          </div>
           
           <p>
           <div class="block">
             <label>ΣΙΤΑ</label>
             <select class="form-control" id="screens" name="<?php echo $worksheet->getCellByColumnAndRow(9,'1')->getValue();?>">
               <?php for ($row = 2; $row <= $worksheet->getHighestRow('I'); $row++) { ?>
                 <option value="<?php echo $worksheet->getCellByColumnAndRow(9,$row)->getValue();?>"><?php echo $worksheet->getCellByColumnAndRow(9,$row)->getValue();?></option>
               <?php } ?>
             </select>
           </div>
           </p>
                     
</div>
      
                                      
</div><!--/.details-container-->
      <div class ="details-text">
        <textarea id="detailsNotes" rows="5" cols="50"></textarea>
      </div>      
         
       
        
        </div><!-- /.modal-body -->

      <div class="modal-footer" >
        <button type="button" class="btn btn-default" id="closeModal" data-dismiss="modal" onclick="clearAlert()" >Close</button>
        <button type="button" class="btn btn-primary" id="updateOrder" >Update</button>
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->