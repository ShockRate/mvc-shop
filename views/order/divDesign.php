<div class="table-container">
  <div>
   
   <div class="img-product">
      <img src="<?=ROOT_URL?>/images/<?=$arr['Type']?>.jpg" alt="<?=$arr['Type']?>.jpg" width="<?=count($arr['X-panelsArray'])*55?>" height="128">
   </div>  
   <div class="table-dim-top">
   <?php foreach ($arr['X-panelsArray'] as $dimX) { 
        echo "<div><span>$dimX</span></div>"; 
        } 
    ?>     
   </div>  
  </div>
   <div class="table-dim-right">                               
   <?php foreach ($arr['Y-panelsArray'] as $dimY) { 
        echo "<div><span>$dimY</span></div>"; 
        } 
    ?>                                          
  </div>
</div>

