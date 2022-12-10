<table class="table table-responsive">
    <div id="message"></div>
    <?php if(isset($_GET['patient_id'])){
    ?>

        <input type="text" disabled placeholder="Patient-ID: <?= $_GET['patient_id'];?>" id="patientID" name="<?= $_GET['patient_id']; ?> ">
    <?php
    }?>

    <thead>
        <tr>
            <th scope="col">Sample No </th>
            <th scope="col">Patient ID </th>
            <th scope="col">Billing Date </th>
            <th scope="col">Sub Total </th>
            <th scope="col">Discount % </th>
            <th scope="col">Discount Amount </th>
            <th scope="col">Net Total </th>
            <th scope="col">Action</th>
        </tr>
   </thead>
  <tbody id="billList">
  </tbody>
</table>
<table class="table table-responsive" style="background-color: #ece7e7;" id="testTable">
    <h3 class="detail">Test Details</h3>
    <thead>
        <tr>
            <th scope="col">Sample No </th>
            <th scope="col">Patient ID </th>
            <th scope="col">Test Item </th>
            <th scope="col">Quantity</th>
            <th scope="col">Unit Price </th>
        </tr>
   </thead>
  <tbody id="testList">
  </tbody>
</table>

<script>
    var previewBillUrl = "<?php echo base_url()."patient/showBills" ?>";
    var showTestUrl = "<?php echo base_url()."patient/showTests" ?>";
    var removeUrl = "<?php echo base_url()."patient/RegAndBill/removeTestAmount"?>";
</script>
<script src="<?php echo base_url();?>js/patient/previewBill.js"> </script>