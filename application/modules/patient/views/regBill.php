<div id="message"></div>
<table class="table table-responsive">
  <input type="text" disabled placeholder="Patient-ID: <?= $_GET['patient_id'];?>" id="patientID" name="<?= $_GET['patient_id']; ?> ">
  <thead>
    <tr>
      <th scope="col"><td><input type="text" id="testname" placeholder="Test Name"></td></th>
      <th scope="col"><input type="number" id="unitprice" placeholder="Unit price"></th>
      <th scope="col"><input type="number" id="qty" placeholder="Qty"></th>
      <th scope="col"><td><input type="number" id="discountPercent" placeholder="Discount%"></td></th>
      <th scope="col"><td><button id="add" type="button" class="btn btn-primary">Add</button></td></th>
      <th scope="col"><button type="button" class="btn btn-secondary" id="clear">Clear</button></th>
    </tr>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Test Name</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Total Price</th>
      <th scope="col">Discount%</th>
      <th scope="col">Discount</th>
      <th scope="col">Net Total</th>
      <th scope="col"> Action </th>
    </tr>
  </thead>
  <tbody id="billList">
  </tbody>
</table>
<script>
  var addUrl = "<?php echo base_url()."patient/RegAndBill/saveTestAmount"?>";
  var removeUrl = "<?php echo base_url()."patient/RegAndBill/removeTestAmount"?>";
</script>

<script src="<?php echo base_url();?>js/patient/regBill.js"> </script>