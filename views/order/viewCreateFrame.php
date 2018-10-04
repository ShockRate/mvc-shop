<br>
<div class="modal-button">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createFrame">
    ΝΕΑ ΚΑΤΑΣΚΕΥΗ
  </button>
</div>

<div class="modal fade" tabindex="-1" id="createFrame">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="mySmallModalLabel">Windows &amp; Doors</h4>
      </div> <!--modal-header-->
      
      <div class="modal-body">
        <div class="row">
          <div class="productSidenav">
            <img id="productImage" src="<?php echo ROOT_URL?>/images/2P-DA-L.jpg"> <!--Product Image-->
            <span id="productLabel" name ="productLabel"></span> <!--Product Name-->
            <div class="tab">
              <button class="tablinks" onclick="openTab(event, 'tab-meters')" id="defaultOpen">Meters</button>
              <button class="tablinks" onclick="openTab(event, 'tab-feet')">Feet</button>      
            </div>
            <form method="post" action="<?php echo BASE_URL; ?>item/createitem"><!--FORM START-->
            <input type="hidden" name="productName" id="productName">
            <input type="text-align" name="productClass" id="productClass"> 
            <div class="formContent">
              <div id="tab-meters" class="tabcontent">
                <div class="block">
                  <label class="input-label">ΠΛΑΤΟΣ:</label>
                  <input class="input-dim" type="number" id="width" name="width" step="0.01" value="2000" min="-9999.99" max="9999.99" required /><br>
                </div>
                <div class="block">
                  <label class="input-label">ΥΨΟΣ:</label>
                  <input class="input-dim" type="number" id="height" name="height"  step="0.01" value="2300" min="-9999.99" max="9999.99" required /><br>
                </div> 
              </div>
            
              <div id="tab-feet" class="tabcontent">
                <div class="block">
                  <label class="input-label">WIDTH:</label>
                  <!-- <div class="block"> -->
                  <input class="input-dim" type="number" id="feet-width" name="feet-width" placeholder="ft" 
                  oninput="LengthConverter()" 
                  onchange="LengthConverter()"/>
                  <input class="input-dim" type="number" id="inches-width" name="inches-width" placeholder="inches"
                  oninput="LengthConverter()" 
                  onchange="LengthConverter()"/>
                  <!-- </div> -->
                </div>
                <div class="block">
                  <label class="input-label">HEIGHT:</label>
                  <!-- <div class="block"> -->
                  <input type="number" id="feet-height" name="feet-height"  placeholder="ft" 
                  oninput="HeightConverter()" 
                  onchange="HeightConverter()"/>
                  <input type="number" id="inches-height" name="inches-height" placeholder="inches"
                  oninput="HeightConverter()" 
                  onchange="HeightConverter()"/>
                  <!-- </div> -->
                </div> 
                <p>Width: <span id="outputWidth"></span></p>
                <p>Height: <span id="outputHeight"></span></p>
              </div> 
            
            </div><!--form content-->
              <br>
            <input type="submit" value="Προσθήκη" class="btn btn-primary" name="newItem">
          </div>
            
            <div class="main-panel">  
              <div class="product-tabs">     
                <ul class="nav nav-tabs" role="tablist">
                  <?php foreach ($data['types']->getCategoriesNames() as $catName) { ?>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href='#<?=str_replace(' ','',$catName)?>'><?php echo $catName?></a>
                    </li>
                  <?php } ?>                
                </ul> 
                  </div>          
              <div class="tab-content">
                <?php foreach ($data['types']->getCategoriesNames() as $catName) { ?>
                  <div id='<?=str_replace(' ','',$catName)?>' class="tab-pane <?php echo (!isset($retVal)) ? 'active' : '' ;?>"><br>
                    <h3><?=$catName?></h3>
                    <div class="panel-body">
                      <?php for ($row = 3; $row <= $data['types']->getCategoryHighestRow($catName); ++ $row) { 
                          $vartype =$data['types']->getCellVal($catName,'2',"$row");
                          $varclass=$data['types']->getCellVal($catName,'3',"$row");
                          $varname =$data['types']->getCellVal($catName,'1',"$row");
                          ?>
                          <label class="checkbox-inline">
                          <img src="<?php echo ROOT_URL?>/images/<?=$vartype;?>.jpg" width="85" height="94" alt="<?php echo $varname;?>"/>
                          <br>
                          <input type="radio" name="productType" id="contype" onchange="WhatToDo()" value="<?php echo $vartype;?>" required <?php //echo $Check->RadioChecked($type, $varname) ?>>
                          <p class="name" name="productRadioName"> 
                                <?php echo $varname;?> 
                          </p>
                          <p class="hidden" name="productRadioClass"> 
                                <?php echo $varclass;?> 
                          </p>              
                          </label>
                      <?php }?>
                    </div> <!-- panel-body -->
                  </div><!--tab-pane-->
                  
                <?php } ?>  
              </div><!--TAB CONTENT-->  
            </div>          
        </div> <!-- row --> 
          </form><!--FORM END-->


      </div> <!-- modal-body -->
      
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div><!--modal-footer-->
          
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
