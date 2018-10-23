<?php
$data['excel'] = new retrieveExcel(DATA);
?>
         
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
        <input type="text" class="input-sm" id="detailsWidth" value = "<?=$data['item']['Width'];?>"/>
      </div>
      <br>
      <div class="block">
        <label class="input-label">ΥΨΟΣ</label>
        <input type="text" class="input-sm" id="detailsHeight" value = "<?=$data['item']['Height']?>"/>
      </div> 
      <br>
      <div class="block">
        <label class="input-label">ΚΑΘΑΡΟ ΦΑΡΔΟΣ</label>
        <input type="text" class="input-sm" id="detailsClearWidth" value = "<?=$data['item']['ClearWidth']?>"/>
      </div>
      <div class="block">
        <label class="input-label">ΚΑΘΑΡΟ ΥΨΟΣ</label>
        <input type="text" class="input-sm" id="detailsClearHeight"  value = "<?=$data['item']['ClearHeight']?>"/>
      </div>
    </div>
    <div class="details-image">    
      <div>
        <div class="block">
          <label class="input-label">ΤΥΠΟΣ</label>              
          <p id="type"></p>
        </div> 
        <div class="builder-container">
          <div class="builder-left">                
            <div class="input-container">
                <?php foreach ($data['item']['X-panelsArray'] as $key => $arr) { ?>
                <div><input type="number" name="dimX<?=$key?>" value = <?=$arr?>></div>
                <?php } ?> 
            </div>
            <br>
            <div>
                <img src="<?=ROOT_URL?>/images/<?=$data['item']['Type']?>.jpg" alt="<?=ROOT_URL?>/images/<?=$data['item']['Type']?>.jpg">
            </div>
          </div>
          <div class="builder-right">   
            <?php foreach ($data['item']['Y-panelsArray'] as $key => $arr) { ?>               
                <div><input type="number" name="dimY<?=$key?>" value = <?=$arr?>></div>
            <?php } ?>                                     
          </div>
        </div>                 
        <br>            
      </div>               
    </div>
    <div class="details-extras">
      <p><input type="text" id="windowIndex" name="sillIndex"></p>
            
            
            <div class="block">
              <label>ΨΕΥΤΟΚΑΣΑ</label>
              <select class="form-control" id="profiles" name="profiles" required>
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('E'); $row++) { ?>
                    <option value="<?php echo $data['excel']->getCellVal('Sheet1',5,$row);?>"><?php echo $data['excel']->getCellVal('Sheet1',5,$row);?></option>
                  <?php } ?>
            </select>
            </div>
            

            <p>
            <div class="block">
              <label>ΡΟΛΑ</label>
              <select class="form-control" id="shutters" name="shutters" required>
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('F'); $row++) { ?>
                    <option value="<?php echo $data['excel']->getCellVal('Sheet1',6,$row);?>"><?php echo $data['excel']->getCellVal('Sheet1',6,$row);?></option>
                  <?php } ?>
            </select>
            </div>
            </p>
            <div id ="extra-parts">
              <div class="block">
                <label>ΦΙΛΑΡΑΚΙ</label>
                <select class="form-control" id="slats" name="slats" required>
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('G'); $row++) { ?>
                    <option value="<?php echo $data['excel']->getCellVal('Sheet1',7,$row);?>"><?php echo $data['excel']->getCellVal('Sheet1',7,$row);?></option>
                  <?php } ?>
            </select>
              </div>
              <div class="block">
                <label>ΚΙΝΗΣΗ ΡΟΛΟΥ</label>
                <select class="form-control" id="mechanism" name="mechanism" required>
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('H'); $row++) { ?>
                    <option value="<?php echo $data['excel']->getCellVal('Sheet1',8,$row);?>"><?php echo $data['excel']->getCellVal('Sheet1',8,$row);?></option>
                  <?php } ?>
            </select>
              </div>
            </div>
            
            <p>
            <div class="block">
              <label>ΣΙΤΑ</label>
              <select class="form-control" id="screens" name="screens" required>
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('I'); $row++) { ?>
                    <option value="<?php echo $data['excel']->getCellVal('Sheet1',9,$row);?>"><?php echo $data['excel']->getCellVal('Sheet1',9,$row);?></option>
                  <?php } ?>
            </select>
            </div>
            </p>
                      
    </div>                                   
  </div><!--/.details-container-->
    <div class ="details-text">
      <textarea id="detailsNotes" rows="5" cols="50"></textarea>
    </div>      
       
     
      
  
    