<?php
$data['excel'] = new retrieveExcel(DATA);
?>
         
<div id="detailsMSG" style="text-align:center;" >

  <?php 
  //echo isset($_SESSION['MSG'])?$_SESSION['MSG']:''; 
  if (isset($_SESSION['MSG'])){
    echo $_SESSION['MSG'];
    unset($_SESSION['MSG']);
    setcookie(session_name(),'',time()-10);
}
  ?>
</div>  
<form method="post" action="<?php echo BASE_URL; ?>item/index/<?=$data['index']?>"><!--FORM START-->

  <div class="details-container">
  <input type="submit" value="ΕΝΗΜΕΡΩΣΗ" class="btn btn-primary" name="updateItem">
    <div class="details-dimensions">
      <div class="block">
        <label class="input-label">ΤΕΜΑΧΙΑ</label>
          <input type="text" class="input-sm" id="pieces" name="pieces" value="<?=$data['item']['Pieces'];?>"/>
      </div>
      <br>
      <div class="block">
        <label class="input-label">ΦΑΡΔΟΣ</label>
        <input type="text" class="input-sm" id="detailsWidth" name="width" value="<?=$data['item']['Width'];?>"
        oninput="clearWidthConverter(<?=$data['item']['SillLeft'];?>,<?=$data['item']['SillRight'];?>)" 
        onchange="clearWidthConverter(<?=$data['item']['SillLeft'];?>,<?=$data['item']['SillRight'];?>)"/>
      </div>
      <br>
      <div class="block">
        <label class="input-label">ΥΨΟΣ</label>
        <input type="text" class="input-sm" id="detailsHeight" name="height"value="<?=$data['item']['Height']?>"
        oninput="clearHeightConverter(<?=$data['item']['SillUp'];?>,<?=$data['item']['SillDown'];?>)" 
        onchange="clearHeightConverter(<?=$data['item']['SillUp'];?>,<?=$data['item']['SillDown'];?>)"/>
      </div> 
      <br>
      <div class="block">
        <label class="input-label">ΚΑΘΑΡΟ ΦΑΡΔΟΣ</label>
        <input type="text" class="input-sm" id="detailsClearWidth" name="clearWidth" value="<?=$data['item']['ClearWidth']?>"/>
      </div>
      <div class="block">
        <label class="input-label">ΚΑΘΑΡΟ ΥΨΟΣ</label>
        <input type="text" class="input-sm" id="detailsClearHeight" name="clearHeight" value="<?=$data['item']['ClearHeight']?>"/>
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
            <div class="block">
              <p><input type="text" id="windowIndex" name="index" value = <?=$data['index']?>></p>
              <p><input type="text"  value="<?=$data['item']['Shutters']?>"></p>
            </div>        
            
            <div class="block">
              <label>ΨΕΥΤΟΚΑΣΑ</label>
              <select class="form-control" id="profiles" name="profiles">
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('E'); $row++) { ?>
                    <option value="<?=$data['excel']->getCellVal('Sheet1',5,$row);?>"
                            <?php echo $retVal = ($data['excel']->getCellVal('Sheet1',5,$row) == $data['item']['Profile']) ? 'selected' : '' ;?>>
                                <?=$data['excel']->getCellVal('Sheet1',5,$row);?>
                    </option>
                  <?php } ?>
              </select>
            </div>
            <p>
            <div class="block">
              <label>ΡΟΛΑ</label>
              <select class="form-control" id="shutters" name="shutters"  onchange="showExtras(this.value)">
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('F'); $row++) { ?>
                    <option value="<?=$data['excel']->getCellVal('Sheet1',6,$row);?>" 
                            <?php echo $retVal = ($data['excel']->getCellVal('Sheet1',6,$row) == $data['item']['Shutters']) ? 'selected' : '' ;?>>
                              <?=$data['excel']->getCellVal('Sheet1',6,$row);?>
                    </option>
                  <?php } ?>
              </select>
            </div>
            </p>
            <p>
            <div class="block">
              <label>ΦΙΛΑΡΑΚΙ</label>
              <select class="form-control" id="slats" name="slats">
                <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('G'); $row++) { ?>
                  <option value="<?=$data['excel']->getCellVal('Sheet1',7,$row);?>"
                          <?php echo $retVal = ($data['excel']->getCellVal('Sheet1',7,$row) == $data['item']['Slats']) ? 'selected' : '' ;?>>
                              <?=$data['excel']->getCellVal('Sheet1',7,$row);?>
                  </option>
                <?php } ?>
              </select>
            </div>
            </p>
            <div style="display: flex"> <!--Div for mechanism-->
              <p>
              <div class="block">
                <label>ΚΙΝΗΣΗ ΡΟΛΟΥ</label>
                <select class="form-control" id="mechanism" name="mechanism">
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('H'); $row++) { ?>
                    <option value="<?=$data['excel']->getCellVal('Sheet1',8,$row);?>"
                            <?php echo $retVal = ($data['excel']->getCellVal('Sheet1',8,$row) == $data['item']['Mechanism']) ? 'selected' : '' ;?>>
                                <?=$data['excel']->getCellVal('Sheet1',8,$row);?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              </p>
              <p>
              <div class="block">
                <label>ΘΕΣΗ</label>
                <select class="form-control" id="mechPos" name="mechPos">
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('I'); $row++) { ?>
                    <option value="<?=$data['excel']->getCellVal('Sheet1',9,$row);?>"
                            <?php echo $retVal = ($data['excel']->getCellVal('Sheet1',9,$row) == $data['item']['MechPos']) ? 'selected' : '' ;?>>
                                <?=$data['excel']->getCellVal('Sheet1',9,$row);?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              </p>
            </div><!--end of Div for mechanism-->
            <p>
            <div class="block">
              <label>ΣΙΤΑ</label>
              <select class="form-control" id="screens" name="screens" value=<?=$data['item']['Screens']?>>
                  <?php for ($row = 2; $row <= $data['excel']->getColumnHighestRow('J'); $row++) { ?>
                    <option value="<?=$data['excel']->getCellVal('Sheet1',10,$row);?>"
                            <?php echo $retVal = ($data['excel']->getCellVal('Sheet1',10,$row) == $data['item']['Screens']) ? 'selected' : '' ;?>>
                                <?=$data['excel']->getCellVal('Sheet1',10,$row);?>
                    </option>
                  <?php } ?>
              </select>
            </div>
            </p>
                      
    </div>     
    <button type="button" onClick="location.href='<?php echo ROOT_URL; ?>/order'"class="btn btn-warning">ΠΙΣΩ</button>                              
  </div><!--/.details-container-->
    <div class ="details-text">
      <textarea id="detailsNotes" name="detailsNotes" rows="10" cols="70"></textarea>
    </div>  
</form>      
 
     
      
  
    