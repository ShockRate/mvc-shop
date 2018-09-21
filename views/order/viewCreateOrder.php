<!-- VIEW ΓΙΑ ΕΠΙΛΟΓΗ ΣΕΙΡΑΣ ΤΖΑΜΙΟΥ ΚΑΙ ΧΡΩΜΑΤΟΣ -->
<div class="container" style="text-align: center; margin-left: auto; margin-right: auto; width: 50%">   
  <form method="post" action="<?php echo BASE_URL; ?>order/createorder">
      <h3> <?php //echo $series;?></h3>
      <div class="block">
          <label class="input-label">ΣΕΙΡΑ:</label>
          <select class="form-control" id="series" name="series" required>
                <?php for ($row = 2; $row <= $data['order']->getColumnHighestRow('A'); $row++) { ?>
                  <option value="<?php echo $data['order']->getCellVal('Sheet1',1,$row);?>"><?php echo $data['order']->getCellVal('Sheet1',1,$row);?></option>
                <?php } ?>
          </select>
      </div>
                  <br>
      <div class="block">
        <label class="input-label">Χρώμα:</label>
        <select class="form-control" id="color" name="color" required>
                <?php for ($row = 2; $row <= $data['order']->getColumnHighestRow('B'); $row++) { ?>
                  <option value="<?php echo $data['order']->getCellVal('Sheet1',2,$row);?>"><?php echo $data['order']->getCellVal('Sheet1',2,$row);?></option>
                <?php } ?>
        </select>
      </div>
      <br>
      <div class="block">
        <label class="input-label">Επιυάλωση:</label>
        <select class="form-control" id="glazzing" name="glazzing" required>
                <?php for ($row = 2; $row <= $data['order']->getColumnHighestRow('C'); $row++) { ?>
                  <option value="<?php echo $data['order']->getCellVal('Sheet1',3,$row);?>"><?php echo $data['order']->getCellVal('Sheet1',3,$row);?></option>
                <?php } ?>
        </select>
      </div>
      
      
      <br>
      <input type="submit" value="Δημιουργια Παραγγελειας" class="btn btn-primary" name="newOrder">
  </form>
</div>
