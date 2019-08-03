<?php

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
  if ($action=="add_order"){
?>
            <script type="text/javascript">
            function onSelection(id, val)
            {
                  var code_id = "item_code["+id+"]";
                  var name_id = "item_name["+id+"]";
                  document.getElementById(code_id).value = val;
                  document.getElementById(name_id).value = val;
            }
            var i = 1;
            function changeIt(totrow){
            	
            	var ele_length = eval("document.inv_orders.elements.length");
            	ele_id_array = new Array(ele_length);
            	ele_val_array = new Array(ele_length);
            	
            	for ( k=0; k<ele_length; k++ )
            	{
            		ele_id_array[k] = document.inv_orders.elements[k].id;
            		ele_val_array[k] = document.inv_orders.elements[k].value;
            	}
            	if(totrow > i)
            	{
            	     i = totrow;
            	     i++;
            	     //alert("if"+i);
            	} else {
                        ++i;
                        //alert("eee"+i);
                  }
            	 
                document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='30%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
                foreach($in_itemsList as $item){
                    echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                    }
                ?></select></td><td width='30%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php 
            		foreach($in_itemsList as $item)
                                                                              {
                                                                                    echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                              }
                                                                        ?></select></td><td width='30%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' /></td></tr></table>";
            	
            	
            	
            	var len_v = ele_val_array.length;
            	for ( n=0; n<len_v; n++ )
            	{
            		var dyn_id = ele_id_array[n];
            		var dyn_val = ele_val_array[n];
            		document.getElementById(dyn_id).value = dyn_val;
            	}
            	
            }
            function DeleteRow(delrw)
            {
                  var ele_length = eval("document.inv_orders.elements.length");
            	ele_id_array = new Array(ele_length);
            	ele_val_array = new Array(ele_length);
            	
            	for ( k=0; k<ele_length; k++ )
            	{
            		ele_id_array[k] = document.inv_orders.elements[k].id;
            		ele_val_array[k] = document.inv_orders.elements[k].value;
            	}
            	  
            	var j = --i;
                  if(i<delrw)
                        i = delrw-1;
                  
                  
                  document.getElementById("my_div").innerHTML = "";
                  
                  if(i < delrw) {
                        alert("You can not delete more Rows.");
                        return false;
                  }
                  
                  if(i>=delrw)
                  {
                        i=delrw;
                        while(i<=j)
                        {
                              document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='30%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
                                                                                    foreach($in_itemsList as $item)
                                                                                    {
                                                                                          echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                                                                                    }
                                                                              ?></select></td><td width='30%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php
                                                                                    foreach($in_itemsList as $item)
                                                                                    {
                                                                                          echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                                    }
                                                                              ?></select></td><td width='30%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' /></td></tr></table>";
                        
                              if(i==j)
                              {
                                    break;
                              }
                              else {
                                    i++;
                              }
                        }
                  }
                  
            	var len_v = ele_val_array.length - 6;
            	for ( n=0; n<len_v; n++ )
            	{
            		var dyn_id = ele_id_array[n];
            		var dyn_val = ele_val_array[n];
            		document.getElementById(dyn_id).value = dyn_val;
            	}
            }
            </script>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
                  <tr>
                        <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<a href="#" class="admin"><strong>Purchase Orders Information</strong></a></td>
                  </tr>
                  <tr>
                        <td width="1" class="bgcolor_02"></td>
                        <td align="left" valign="top">
            	            <form name="inv_orders" action="" method="post" >
            				<table width="100%" border="0" cellspacing="0" cellpadding="1">
                                          <tr>
                                                <td colspan="2" align="center"><?php if($message != "") echo $message;?></td>
                                          </tr>
                                          <tr>
                                                <td colspan="2"><p class="narmal"><strong>&nbsp;&nbsp;Order Details Information</strong></p></td>
                                          </tr>
                                          <tr>
                                                <td colspan="2" align="center" valign="top" >
                                                      <table width="98%" border="0" cellspacing="3" cellpadding="0">
                                                            <tr>
                                                                  <td width="25%" class="narmal" align="left" >Order No </td>
                                                                  <td width="75%" class="narmal" align="left"><?php echo $nextOrder;?></td>
                                                            </tr>
                                                            <tr>
                                                                  <td class="narmal">Order Date </td>
                                                                  <td class="narmal"><input type="text" name="order_date" id="order_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                  <td class="narmal">Supplier Name</td>
                                                                  <td class="narmal">
                                                                        <select name="in_suplier_name" id="in_suplier_name">
                                                                              <option value="">.........select..........</option>
                                                                              <?php
                                                                                    foreach($in_supplierList as $sup){
                                                                                          echo "<option value='$sup->es_in_supplier_masterId'>$sup->in_name</option>";
                                                                                    }
                                                                              ?>
                                                                        </select>
                                                                  </td>
                                                            </tr>
                                                      </table>
                                                </td>
                                          </tr>
                                          <tr>
                                                <td colspan="2">&nbsp;</td>
                                          </tr>
                                          <tr>
                                                <td colspan="2">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                  <td width="84%" height="20" colspan="3" class="narmal"><strong>&nbsp;&nbsp;Purchase Orders List</strong></td>
                                                            </tr>
                                                            <tr>
                                                                  <td height="20" colspan="3" class="narmal">
                                                                        <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                                                                              <tr class="bgcolor_02">
                                                                                    <td width="10%"  height="20" align="center"><strong>S.No</strong></td>
                                                                                    <td width="30%" align="center"><strong>Item Code</strong></td>
                                                                                    <td width="30%" align="center"><strong>Item Name</strong></td>
                                                                                    <td width="30%" align="center"><strong>Quantity</strong></td>
                                                                              </tr>
                                                                        <?php
                                                                              $cn = 1;
                                                                              
                                                                              if($Ord_itemList!="")
                                                                              {
                                                                                    foreach($Ord_itemList as $orIt)
                                                                                    {
                                                                        ?>
                                                                                          <tr>
                                                                                                <td align="center" ><?php echo $cn;?></td>
                                                                                                <td align="center">
                                                                                                      <select name="item_code[<?php echo $cn;?>]" id="item_code[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);">
                                                                                                            <option value="">.....Select Item Code.....</option>
                                                                                                            <?php
                                                                                                                  foreach($in_itemsList as $item)
                                                                                                                  {
                                                                                                                        if($item->es_in_item_masterId == $orIt['es_in_item_masterid'])
                                                                                                                              $sel = "selected";
                                                                                                                        else
                                                                                                                              $sel = "";
                                                                                                                        
                                                                                                                        echo "<option value='$item->es_in_item_masterId' $sel>$item->in_item_code</option>";
                                                                                                                  }
                                                                                                            ?>
                                                                                                      </select>
                                                                                                </td>
                                                                                                <td align="center">
                                                                                                      <select name="item_name[<?php echo $cn;?>]" id="item_name[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);">
                                                                                                            <option value="" >.....Select Item Name.....</option>
                                                                                                            <?php
                                                                                                                  foreach($in_itemsList as $item)
                                                                                                                  {
                                                                                                                        if($item->es_in_item_masterId == $orIt['es_in_item_masterid'])
                                                                                                                              $sel = "selected";
                                                                                                                        else
                                                                                                                              $sel = "";
                                                                                                                        
                                                                                                                        echo "<option value='$item->es_in_item_masterId' $sel>$item->in_item_name</option>";
                                                                                                                  }
                                                                                                            ?>
                                                                                                      </select>
                                                                                                </td>
                                                                                                <td align="center"><input name="quantity[<?php echo $cn;?>]" id="quantity[<?php echo $cn;?>]" value="" style="width:97%;" /></td>
                                                                                          </tr>
                                                                        <?php
                                                                                          $cn++;
                                                                                    }
                                                                              }
                                                                              else
                                                                              {
                                                                        ?>
                                                                              <tr>
                                                                                    <td align="center" >1</td>
                                                                                    <td align="center">
                                                                                          <select name="item_code[1]" id="item_code[1]" style="width:100%;" onchange="onSelection('1',this.value);">
                                                                                                <option value="">.....Select Item Code.....</option>
                                                                                                <?php
                                                                                                      foreach($in_itemsList as $item)
                                                                                                      {
                                                                                                            echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                                                                                                      }
                                                                                                ?>
                                                                                          </select>
                                                                                    </td>
                                                                                    <td align="center">
                                                                                          <select name="item_name[1]" id="item_name[1]" style="width:100%;" onchange="onSelection('1',this.value);">
                                                                                                <option value="">.....Select Item Name.....</option>
                                                                                                <?php
                                                                                                      foreach($in_itemsList as $item)
                                                                                                      {
                                                                                                            echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                                                      }
                                                                                                ?>
                                                                                          </select>
                                                                                    </td>
                                                                                    <td align="center"><input name="quantity[1]" id="quantity[1]" value="" style="width:97%;" /></td>
                                                                              </tr>
                                                                        <?php } ?>
                                                                        </table>
                                                                        <div id="my_div"></div>
                                                                  </td>
                                                            </tr>
                                                            <tr>
                                                                  <td height="20" colspan="3" align="right">
                                                                        <!--<a href="javascript:void(0);" onClick="changeIt()" class="admin"><strong>Add More Row</strong></a>
                                                                        <a href="javascript:void(0);" onClick="DeleteRow()" class="admin"><strong>Delete Last Row</strong></a>-->
                                                                        <input type="button" name="addrow" id="addrow" class="bgcolor_02" value="Add More Row" onClick="changeIt('<?php echo $cn-1;?>')">&nbsp;&nbsp;
            	                                                      <input type="button" name="deleterow" id="deleterow" class="bgcolor_02" value="Delete Last Row" onClick="DeleteRow('<?php if($Ord_itemList !="") echo $cn; else echo $cn+1;?>')">
                                                                  </td>
                                                            </tr>
                                                      </table>
                                                </td>
                                          </tr>
                                          <tr>
                                                <td width="15%" align="right">&nbsp;</td>
                                                <td width="85%" align="left">&nbsp;</td>
                                          </tr>
                                          <tr>
                                                <td colspan="2" align="left"><input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Add To Order" /></td>
                                          </tr>
                              </table>
                          </form>
                        </td>
                        <td width="1" class="bgcolor_02"></td>
                  </tr>
                  <tr>
                        <td height="1" colspan="3" class="bgcolor_02"></td>
                  </tr>
            </table>
<?php
      }
      if($action=="goods_reciept")
      {
?>
            <script type="text/javascript">
            function showSupplier(ord,supArr)
            {
                  var ArrSup = new Array();
                  ArrMix = supArr.split("$");
                  ArrOrdid = ArrMix[0].split("#");
                  ArrSupl = ArrMix[1].split("#");
                  for(qqq=0;qqq<ArrOrdid.length;qqq++)
                  {
                        if(ArrOrdid[qqq] == ord)
                        {
                              supliernm = ArrSupl[qqq];
                        }
                  }
                  document.getElementById("in_suplier_name").value = supliernm;
            }
            function showOrderItems(ord,supArr)
            {
                  if(document.getElementById("es_in_ordersid").value != "")
                  {
                        document.goods_reciept.submit();
                  }
            }
            function onSelection(id, val)
            {
                  var code_id = "item_code["+id+"]";
                  var name_id = "item_name["+id+"]";
                  document.getElementById(code_id).value = val;
                  document.getElementById(name_id).value = val;
            }
            function calculateamount(id)
            {
                  if(isNaN(id)) {
                        if(!document.getElementById(id).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/))
                        {
                              alert("Invalid Format");
                              document.getElementById(id).focus();
                              return false;
                        }
                        var loop = i;
                  } else {
                        var loop = id;
                  }
                  
                  var tot = 0;
                  for(z=1;z<=loop;z++)
                  {
                        var itm = "item_name["+z+"]";
                        var qty = "quantity["+z+"]";
                        var prc = "price["+z+"]";
                        var amt = "amount["+z+"]";
                        var quantity = document.getElementById(qty).value;
                        var price = document.getElementById(prc).value;
                        if(quantity!="" && quantity!=0 && price!="" && price!=0)
                        {
                              var amount = quantity * price;
                              document.getElementById(amt).value = amount;
                              tot = tot + amount;
                              if(document.getElementById(itm).value=="") {
                                    alert("Please Select the Item");
                                    document.getElementById(itm).focus();
                              }
                        }
                  }
                  document.getElementById("in_tot_amnt").value = tot;
                  document.getElementById("total").innerHTML = tot;
            }
            var i = 1;
            function changeIt(totrow){
            	
            	var ele_length = eval("document.goods_reciept.elements.length");
            	ele_id_array = new Array(ele_length);
            	ele_val_array = new Array(ele_length);
            	
            	for ( k=0; k<ele_length; k++ )
            	{
            		ele_id_array[k] = document.goods_reciept.elements[k].id;
            		ele_val_array[k] = document.goods_reciept.elements[k].value;
            	}
            	  
            	if(totrow > i)
            	{
            	     i = totrow;
            	     i++;
            	     //alert("if"+i);
            	} else {
                        ++i;
                        //alert("eee"+i);
                  }
            	  
                  document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='18%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>Select Code</option><?php
                                                                      foreach($in_itemsList as $item){
                                                                          echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                                                                          }
                                                                      ?></select></td><td width='18%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>Select Name</option><?php 
                                                                  		foreach($in_itemsList as $item)
                                                                              {
                                                                                    echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                              }
                                                                        ?></select></td><td width='18%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='price["+i+"]' id='price["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='amount["+i+"]' id='amount["+i+"]' value='' style='width:97%;' readonly /></td></tr></table>";
            	
            	
            	
            	var len_v = ele_val_array.length;
            	for ( n=0; n<len_v; n++ )
            	{
            		var dyn_id = ele_id_array[n];
            		var dyn_val = ele_val_array[n];
            		document.getElementById(dyn_id).value = dyn_val;
            	}
            	
            }
            function DeleteRow(delrw)
            {
            	var ele_length = eval("document.goods_reciept.elements.length");
            	ele_id_array = new Array(ele_length);
            	ele_val_array = new Array(ele_length);
            	
            	for ( k=0; k<ele_length; k++ )
            	{
            		ele_id_array[k] = document.goods_reciept.elements[k].id;
            		ele_val_array[k] = document.goods_reciept.elements[k].value;
            	}
            	  
            	var j = --i;
                  if(i<delrw)
                        i = delrw-1;
                  
                  
                  document.getElementById("my_div").innerHTML = "";
                  
                  if(i < delrw) {
                        alert("You can not delete more Rows.");
                        return false;
                  }
                  
                  if(i>=delrw)
                  {
                        i=delrw;
                        while(i<=j)
                        {
                  
                              document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='18%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
                                                                      foreach($in_itemsList as $item){
                                                                          echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                                                                          }
                                                                      ?></select></td><td width='18%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php 
                                                                  		foreach($in_itemsList as $item)
                                                                              {
                                                                                    echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                              }
                                                                        ?></select></td><td width='18%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='price["+i+"]' id='price["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='amount["+i+"]' id='amount["+i+"]' value='' style='width:97%;' readonly /></td></tr></table>";
                  
                              if(i==j)
                              {
                                    break;
                              }
                              else {
                                    i++;
                              }
                        }
                  }
            	
            	var len_v = ele_val_array.length - 9;
            	for ( n=0; n<len_v; n++ )
            	{
            		var dyn_id = ele_id_array[n];
            		var dyn_val = ele_val_array[n];
            		document.getElementById(dyn_id).value = dyn_val;
            	}
            	calculateamount(j);
            }
            </script>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
                  <tr>
                        <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<a href="#" class="admin"><strong>Goods Receipt Note (GRN)</strong></a></td>
                  </tr>
                  <tr>
                        <td width="1" class="bgcolor_02"></td>
                        <td align="left" valign="top">
            	            <form name="goods_reciept" action="" method="post" >
            				<table width="100%" border="0" cellspacing="0" cellpadding="1">
                                          <tr>
                                                <td colspan="2" align="center"><?php if($message != "") echo $message;?></td>
                                          </tr>
                                          <tr>
                                                <td colspan="2" align="center" valign="top" >
                                                      <table width="98%" border="0" cellspacing="3" cellpadding="0">
                                                            <tr>
                                                                  <td width="25%" class="narmal" align="left" >GRN No.</td>
                                                                  <td width="75%" class="narmal" align="left"><input type="hidden" name="in_rec_note_no" id="in_rec_note_no" value="<?php echo $nextGrn;?>" /><?php echo $nextGrn;?></td>
                                                            </tr>
                                                            <tr>
                                                                  <td class="narmal">Order No.</td>
                                                                  <td class="narmal">
                                                                        <select name="es_in_ordersid" id="es_in_ordersid" onchange="showOrderItems(this.value,'<?php echo $ArrOrdidSupnm;?>')">
                                                                              <option value="">.........select..........</option>
                                                                              <?php
                                                                                    foreach($in_OrdersList as $ord){
                                                                                          if($OrdItemList->es_in_ordersId == $ord->es_in_ordersId) {
                                                                                                $sel = "selected";
                                                                                          } else {
                                                                                                $sel = "";
                                                                                          }
                                                                                          echo "<option value='$ord->es_in_ordersId' $sel >$ord->es_in_ordersId</option>";
                                                                                    }
                                                                              ?>
                                                                        </select>
                                                                  </td>
                                                            </tr>
                                                            <tr>
                                                                  <td class="narmal">Supplier Name</td>
                                                                  <td class="narmal">
                                                                        <select name="in_suplier_name" id="in_suplier_name" disabled >
                                                                              <option value="">.........select..........</option>
                                                                              <?php
                                                                                    foreach($in_supplierList as $sup){
                                                                                          if($OrdItemList->in_suplier_name == $sup->es_in_supplier_masterId) {
                                                                                                $sel = "selected";
                                                                                          } else {
                                                                                                $sel = "";
                                                                                          }
                                                                                          echo "<option value='$sup->es_in_supplier_masterId' $sel >$sup->in_name</option>";
                                                                                    }
                                                                              ?>
                                                                        </select>
                                                                  </td>
                                                            </tr>
                                                            <tr>
                                                                  <td class="narmal">GRN Date</td>
                                                                  <td class="narmal"><input type="text" name="in_rec_date" id="in_rec_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                  <td class="narmal">Bill No.</td>
                                                                  <td class="narmal"><input type="text" name="in_rec_bill_no" id="in_rec_bill_no" /></td>
                                                            </tr>
                                                      </table>
                                                </td>
                                          </tr>
                                          <tr>
                                                <td colspan="2">&nbsp;</td>
                                          </tr>
                                          <tr>
                                                <td colspan="2">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                  <td width="84%" height="20" colspan="3" class="narmal"><strong>&nbsp;&nbsp;Purchase Orders List</strong></td>
                                                            </tr>
                                                            <tr>
                                                                  <td height="20" colspan="3" class="narmal">
                                                                        <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                                                                              <tr class="bgcolor_02">
                                                                                    <td width="10%"  height="20" align="center"><strong>S.No</strong></td>
                                                                                    <td width="18%" align="center"><strong>Item Code</strong></td>
                                                                                    <td width="18%" align="center"><strong>Item Name</strong></td>
                                                                                    <td width="18%" align="center"><strong>Quantity</strong></td>
                                                                                    <td width="18%" align="center"><strong>Price</strong></td>
                                                                                    <td width="18%" align="center"><strong>Amount</strong></td>
                                                                              </tr>
                                                                              
                                                                              <?php
                                                                              $cn = 1;
                                                                              
                                                                                    if($ItemsPurchased!="")
                                                                                    {
                                                                                          foreach($ItemsPurchased as $orIt)
                                                                                          {
                                                                              ?>
                                                                                                <tr>
                                                                                                      <td align="center" ><?php echo $cn;?></td>
                                                                                                      <td align="center">
                                                                                                            <select name="item_code[<?php echo $cn;?>]" id="item_code[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);">
                                                                                                                  <option value="">Select Code</option>
                                                                                                                  <?php
                                                                                                                        foreach($in_itemsList as $item)
                                                                                                                        {
                                                                                                                              if($item->es_in_item_masterId == $orIt['item_code'])
                                                                                                                                    $sel = "selected";
                                                                                                                              else
                                                                                                                                    $sel = "";
                                                                                                                              echo "<option value='$item->es_in_item_masterId' $sel >$item->in_item_code</option>";
                                                                                                                        }
                                                                                                                  ?>
                                                                                                            </select>
                                                                                                      </td>
                                                                                                      <td align="center">
                                                                                                            <select name="item_name[<?php echo $cn;?>]" id="item_name[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);">
                                                                                                                  <option value="">Select Name</option>
                                                                                                                  <?php
                                                                                                                        foreach($in_itemsList as $item)
                                                                                                                        {
                                                                                                                              if($item->es_in_item_masterId == $orIt['item_name'])
                                                                                                                                    $sel = "selected";
                                                                                                                              else
                                                                                                                                    $sel = "";
                                                                                                                              echo "<option value='$item->es_in_item_masterId' $sel >$item->in_item_name</option>";
                                                                                                                        }
                                                                                                                  ?>
                                                                                                            </select>
                                                                                                      </td>
                                                                                                      <td align="center"><input name="quantity[<?php echo $cn;?>]" id="quantity[<?php echo $cn;?>]" value="<?php if($orIt['item_name']!="") echo $orIt['quantity']; ?>" style="width:97%;" onblur="calculateamount(this.id);" /></td>
                                                                                                      <td align="center"><input name="price[<?php echo $cn;?>]" id="price[<?php echo $cn;?>]" value="" style="width:97%;" onblur="calculateamount(this.id);" /></td>
                                                                                                      <td align="center"><input name="amount[<?php echo $cn;?>]" id="amount[<?php echo $cn;?>]" value="" style="width:97%;" readonly /></td>
                                                                                                </tr>
                                                                              <?php
                                                                                                $cn++;
                                                                                          }
                                                                                    }
                                                                                    else
                                                                                    {
                                                                              ?>
                                                                                    <tr>
                                                                                          <td align="center" >1</td>
                                                                                          <td align="center">
                                                                                                <select name="item_code[1]" id="item_code[1]" style="width:100%;" onchange="onSelection('1',this.value);">
                                                                                                      <option value="">Select Code</option>
                                                                                                      <?php
                                                                                                            foreach($in_itemsList as $item)
                                                                                                            {
                                                                                                                  echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                                                                                                            }
                                                                                                      ?>
                                                                                                </select>
                                                                                          </td>
                                                                                          <td align="center">
                                                                                                <select name="item_name[1]" id="item_name[1]" style="width:100%;" onchange="onSelection('1',this.value);">
                                                                                                      <option value="">Select Name</option>
                                                                                                      <?php
                                                                                                            foreach($in_itemsList as $item)
                                                                                                            {
                                                                                                                  echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                                                            }
                                                                                                      ?>
                                                                                                </select>
                                                                                          </td>
                                                                                          <td align="center"><input name="quantity[1]" id="quantity[1]" value="" style="width:97%;" onblur="calculateamount(this.id);" /></td>
                                                                                          <td align="center"><input name="price[1]" id="price[1]" value="" style="width:97%;" onblur="calculateamount(this.id);" /></td>
                                                                                          <td align="center"><input name="amount[1]" id="amount[1]" value="" style="width:97%;" readonly /></td>
                                                                                    </tr>
                                                                              <?php } ?>
                                                                              
                                                                        </table>
                                                                        <div id="my_div"></div>
                                                                  </td>
                                                            </tr>
                                                            <tr>
                                                                  <td height="20" colspan="3" >
                                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                              <tr>
                                                                                    <td width="82%"  height="20" align="right"><strong>Total Amount : </strong></td>
                                                                                    <td width="18%" align="center" id="total">0</td>
                                                                              </tr>
                                                                        </table>
                                                                  </td>
                                                            </tr>
                                                            <tr>
                                                                  <td height="20" colspan="3" align="right">
                                                                        <input type="hidden" name="in_tot_amnt" id="in_tot_amnt" value="" />
                                                                        <!--<a href="javascript:void(0);" onClick="changeIt()" class="admin"><strong>Add More Row</strong></a>
                                                                        <a href="javascript:void(0);" onClick="DeleteRow()" class="admin"><strong>Delete Last Row</strong></a>-->
                                                                        <input type="button" name="addrow" id="addrow" class="bgcolor_02" value="Add More Row" onClick="changeIt(<?php echo $cn-1;?>)">&nbsp;&nbsp;
            	                                                      <input type="button" name="deleterow" id="deleterow" class="bgcolor_02" value="Delete Last Row" onClick="DeleteRow(<?php if($ItemsPurchased !="") echo $cn; else echo $cn+1;?>)">
                                                                  </td>
                                                            </tr>
                                                      </table>
                                                </td>
                                          </tr>
                                          <tr>
                                                <td width="15%" align="right">&nbsp;</td>
                                                <td width="85%" align="left">&nbsp;</td>
                                          </tr>
                                          <tr>
                                                <td colspan="2" align="left"><input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Add Reciept Note" /></td>
                                          </tr>
                              </table>
                          </form>
                        </td>
                        <td width="1" class="bgcolor_02"></td>
                  </tr>
                  <tr>
                        <td height="1" colspan="3" class="bgcolor_02"></td>
                  </tr>
            </table>
<?php
      }
      if($action=='stock_details'){
?>
            <script type="text/javascript">
            function SelectChkbox()
            {
                  var oInputs = document.getElementsByTagName('input');
                  if(document.getElementById("checkall").checked == true) {
                        var ischked = true;
                  }else{
                        var ischked = false;
                  }
                  for ( i = 0; i < oInputs.length; i++ )
                  {
                  // loop through and find <input type="checkbox"/>
                        if (oInputs[i].type == 'checkbox')
                        {
                              var chk_box = oInputs[i].id;
                              document.getElementById(chk_box).checked = ischked;
                        }
                  }
                  
               
            }
            </script>
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<a href="#" class="admin">&nbsp;<strong>Stock Details</strong></a></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="10"></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><table width="100%">
                                      <form action="" method="post" name="inventory" id="inventory" >
                                        <tr>
                                          <td width="210"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="61%" class="narmal"><strong>Last&nbsp;Recieved&nbsp;Date&nbsp;</strong>From:</td>
                                                <td width="34%"><input class="plain" name="dc1" value="" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td width="25%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.inventory.dc1,document.inventory.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>
                                          <td width="210"><table width="94%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="61%"  class="narmal">To:</td>
                                                <td width="34%"><input class="plain" name="dc2" value="" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td width="25%"> <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.inventory.dc1,document.inventory.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>
                                         <td><select name="reorder"><option value="">ALL</option>
											 <option value="<">Below</option>
											 <option value=">">Above</option></select></td>
										<td><input type="submit" name="Search" value="Search" class="bgcolor_02" /></td>
                                        </tr>
                                      </form>
                                  </table>
								  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe> </td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
                                      <tr>
                                        <td height="10" colspan="8"></td>
                                      </tr>
                                      <tr class="bgcolor_02">
                                        <td width="5%"  height="20" align="center"><input type="checkbox" name="checkall" id="checkall" onclick="SelectChkbox();" /></td>
                                        <td width="15%" align="center"><strong>Item Code</strong></td>
                                        <td width="15%" align="center"><strong>Item Name</strong></td>
                                        <td width="10%" align="center"><strong>Units</strong></td>
                                        <td width="13%" align="center"><strong>Qty on hand</strong></td>
                                        <td width="15%" align="center"><strong>Last Rec. Date</strong></td>
                                        <td width="15%" align="center"><strong>Last Issue Date</strong></td>
                                        <td width="12%" align="center"><strong>RE Order Level</strong></td>
                                      </tr>
                                      <?php
                                          $bg=1;
                                          foreach($in_itemsList as $item)
                                          {
                                                if($bg%2 == 0)
                                                      $class = "even";
                                                else  $class = "odd";
                                    ?>
                                      <tr class="<?php echo $class;?>">
                                        <td align="center" ><input type="checkbox" name="checkitem[<?php echo $item->es_in_item_masterId;?>]" id="checkitem[<?php echo $item->es_in_item_masterId;?>]" value="<?php echo $item->es_in_item_masterId;?>" /></td>
                                        <td align="center"><?php echo $item->in_item_code;?></td>
                                        <td align="center"><?php echo $item->in_item_name;?></td>
                                        <td align="center"><?php echo $item->in_units;?></td>
                                        <td align="center"><?php echo $item->in_qty_available;?></td>
                                        <td align="center"><?php echo $item->in_last_recieved_date;?></td>
                                        <td align="center"><?php echo $item->in_last_issued_date;?></td>
                                        <td align="center"><?php echo $item->in_reorder_level;?></td>
                                      </tr>
                                      <?php
                                                $bg++;
                                          }
                                    ?>
                                      <tr>
                                        <td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
                                      </tr>
                                      <tr>
                                        <td colspan="8" align="left"><input type="submit" name="OrderNow" class="bgcolor_02" id="OrderNow" value="Order Now" /></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                        <tr>
                            <td colspan="4" align="center">&nbsp;</td>
                        </tr>
                      </table></td>
                    </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
            <?php
      }
?>
