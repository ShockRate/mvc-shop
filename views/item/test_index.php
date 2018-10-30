<?php
$data['excel'] = new retrieveExcel(DATA);
?>
         

<form method="post" action="<?php echo BASE_URL; ?>item"><!--FORM START-->
  <div class="details-container">
    <div class="details-image">    
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
            </div><!--/.input-container-->
            <br>
            <div>
                <img src="<?=ROOT_URL?>/images/<?=$data['item']['Type']?>.jpg" alt="<?=ROOT_URL?>/images/<?=$data['item']['Type']?>.jpg">
            </div>
          </div><!--/.builder-left-->
          <div class="builder-right">   
            <?php foreach ($data['item']['Y-panelsArray'] as $key => $arr) { ?>               
                <div><input type="number" name="dimY<?=$key?>" value = <?=$arr?>></div>
            <?php } ?>                                     
          </div><!--/.builder-right-->
        </div><!--/.builder-container-->                 
        <br>                        
    </div><!--/.details-image-->                                    
  </div><!--/.details-container-->
  <div class ="details-text">
    <textarea id="detailsNotes" rows="5" cols="50"></textarea>
  </div>  
</form>        
       
     
      
  
    