<?php  $i = 1;
 //echo $series;
 //$tableBuilder   = new tableBuilder;
?>

				<div class="main">
				<table id="t01">
				  <tr>
				    <th>A/A</th>
				    <th>Θέση</th> 
				    <th>Τύπος</th>
				    <th>Τεμάχια</th>
				    <th>Πλάτος/Υψος</th> 
				    <th>Περβαζια</th>				   
				    <th>Σχέδια από Μέσα</th>
				    <th>Καθαρά Μέτρα</th> 
				    <th>Ψευτόκασα</th>
				    <th>Παντζούρι/Σϊτα</th>
				    <th>Ρόλο/Σϊτα</th>
				    <th>Καϊτια</th>
				    <th>Παρατηρησεις</th>   
				    <th></th> 
				  </tr>

				  <?php 
				 
				  if (isset($_SESSION['Cart']) && !empty($_SESSION['Cart'])){
				
				  foreach ($_SESSION['Cart'] as $key => $arr) { 
				  	?>
				  <tr id="tableEntry<?php echo $i;?>">
				    <td><?php echo $key+1;?></td>
				    <td></td>
				    <td><?php echo $arr['Name'];?></td>
				    <td><?php echo isset($arr['Pieces'])?$arr['Pieces']:'';?></td>
				    <td><?php echo $arr['Width'].'/<br>'.$arr['Height'];?></td>
					<td><?php include 'divSills.php';
						echo '.'.substr($arr['Sills'],strlen(ROOT_URL));
					?></td>
				  
				    <td class="table-cell">
						<button class="btn myDetailsBtn" onClick="location.href='<?php echo BASE_URL; ?>item/index/<?php echo  $key+1;?>'">ΛΕΠΤΟΜΕΡΙΕΣ</button>
						<?php include 'divDesign.php'
						//echo $tableBuilder->_printImg($arr['Type'],$arr['Class'],$arr['dimCase1'],$arr['dimCase3'],$arr['dimCase5'],$arr['DimUp'],$arr['DimMiddle'],$arr['dimCase2'],$arr['dimCase4']);
				    	?>
					</td>
				    <td><?php echo ($arr['Width'] - $arr['SillLeft'] - $arr['SillRight']).'/<br>'.($arr['Height'] - $arr['SillUp'] - $arr['SillDown']);?></td>
				    <td><?php echo $arr['Profile'];?></td>
				    <td><?php echo $arr['Screens'];?></td>
					<td>
						
						<?php echo $arr['Shutters'].'<br>';?>
						<?php echo $arr['Slats'].'<br>';?>
						<?php echo $arr['Mechanism'].'<br>';?>
						<?php echo $arr['MechPos'].'<br>';?>
						
					</td>
				    <td></td>
				    <td><?php echo $arr['DetailsNotes'];?></td>
					<td>
						<button class="btn btn-danger btn-sm deleteBtn">ΔΙΑΓΡΑΦΗ</button>
					</td>
				</tr>
						<?php } 
					}?>
						
				 
				</table>
				
				
			</div>
			<br>
			<!-- <div style="text-align: center;">
				<button type="button" class="btn btn-warning" id="clearTable">ΕΚΑΘΑΡΙΣΗ ΠΑΡΑΓΓΕΛΙΑΣ</button>			
			</div> -->
			<br>
			
			
				<div style="text-align: center;">
					<button class="btn btn-primary" id="btn-download" onClick="location.href='<?php echo BASE_URL; ?>order/download/'">Download Excel</button>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary" id="btn-download2" onClick="location.href='<?php echo BASE_URL; ?>order/download2/'">test Download Excel</button>
				</div>
		
		