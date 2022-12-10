<form class="row g-3">
<div id="message"></div>
  <div class="col-md-6">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="col-md-4">
    <label for="age" class="form-label">Age</label>
    <input type="text" class="form-control" id="age" name="age">
  </div>
  <div class="col-md-2">
    <label class="form-label">Gender</label>
    <div class="form-check" >
      <input class="form-check-input" type="radio" name="gender" value="M" id="forMale">
      <label class="form-check-label" for="forMale">
        Male
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" value="F" id="forFemale">
    <label class="form-check-label" for="forFemale">
       Female
    </label>
  </div>
  </div>

  <div class="col-md-4">
    <label for="country" class="form-label">Country</label>
    <select id="country" name="country" class="form-select">
    </select>
  </div>
  <div class="col-md-4">
    <label for="province" class="form-label">Province</label>
    <select id="province" name="province" class="form-select">
    </select>
  </div>
  <div class="col-md-4">
    <label for="municipality"  class="form-label">Municipality</label>
    <select id="municipality" name="municipality" class="form-select">
    </select>
  </div>

  <div class="col-12">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St">
  </div>
  <div class="col-md-6">
    <label for="phoneno" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="phoneno" pattern="\d{10}" title="Please enter exactly 10 digits" > 
  </div>
  <div class="col-md-12 d-flex">
    <label for="language">Language: </label>
    <div class="col-md-1 form-check" id="language">
      <input class="form-check-input" type="checkbox" name="language" value="English">
      <label class="form-check-label">
        English
      </label>
    </div>
    <div class="col-md-1 form-check">
      <input class="form-check-input" type="checkbox" name="language" value="Chinese">
      <label class="form-check-label">
        Chinese
      </label>
    </div>
    <div class="col-md-1 form-check">
      <input class="form-check-input" type="checkbox" name="language" value="Nepali">
      <label class="form-check-label">
        Nepali
      </label>
    </div>
</div>
  <div class="col-12">
    <button type="button" id="register" class="btn btn-primary">Register</button>
  </div>
</form>

<script src="<?php echo base_url();?>js/patient/registerPatient.js"> </script>