<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Patient ID.</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Age/Gender</th>
      <th scope="col">District</th>
      <th scope="col">Address</th>
      <th scope="col">Registered Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="patientList">
  </tbody>
</table>
  <script>
    var url = "<?php echo base_url()."patient/showPatient" ?>";
  </script>

  <script src="<?php echo base_url();?>js/patient/dashboard.js"> </script>

  