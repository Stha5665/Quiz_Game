$(function(){
    loadPatientsDetails();

    // This functiong gets all patient details and show all details
    function loadPatientsDetails(){
      $.get(
          url,
          function(data){
              // data is returned by controller as array
              // which needed to be convert into javascript object
              data = JSON.parse(data); 
              var html = '';
              for(var i= 0; i < data.length; i++){
                  html += '<tr>' +
                  '<td>' + (i+1) + '</td>' +
                  '<td>' + data[i].patient_id + '</td>' +
                  '<td>' + data[i].name + '</td>' +
                  '<td>' + data[i].age + ' Y/ ' + data[i].gender + '</td>' +
                  '<td>' + data[i].province + '</td>' +
                  '<td>' + data[i].address + '</td>' +
                  '<td>' + data[i].date_time + '</td>' +
                  '<td><a class="btn btn-primary" href="/hmvc/patient/registerBilling?patient_id=' + data[i].patient_id +'"> Reg&Billing</a>' +
                  '<a class="btn btn-primary" style="margin: 10px;" href="/hmvc/patient/previewBills?patient_id=' + data[i].patient_id +'"> Preview </a></td></tr>';
              }
              
              $('#patientList').html(html);

              
          }
      );
           
    }

  });