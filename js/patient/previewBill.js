$(function(){
    $('#testTable').hide();
    $('.detail').hide();
    loadPatientsDetails();
    function loadPatientsDetails(){
    // This functions show the details of seleted patient
      var patient_id = $('#patientID').attr("name");
      $.get(
          previewBillUrl,{patient_id},
          function(data){
              // data is returned by controller as array
              // which needed to be convert into javascript object
  
              data = JSON.parse(data); 
              var html = '';
              for(var i= 0; i < data.length; i++){
                  html += '<tr>' +
                  '<td>' + data[i].sample_no + '</td>' +
                  '<td>' + data[i].patient_id + '</td>' +
                  '<td>' + data[i].billing_date + '</td>' +
                  '<td>' + data[i].sub_total + '</td>' +
                  '<td>' + data[i].discount_percent + '</td>' +
                  '<td>' + data[i].discount_amount + '</td>' +
                  '<td>' + data[i].net_total + '</td>' +
                  '<td><a value="'+data[i].sample_no+'" class="btn btn-primary testDetails"> Test Details</a>'+
                  '<a value="'+data[i].sample_no+'" style="margin:5px;" class="btn btn-danger" id="deleteDetails"> Delete</a></td>';
              }

              $('#billList').html(html);
          }
      );

  }

  // As button later appended so, only works with .on() function click() event cannot be
      // called directly
  $(document).on('click', ".testDetails", function() {
      $('#testTable').show();
      $('.detail').show();
      var sample_no = $(this).attr("value");
      loadTestDetails(sample_no);
  });

  // Ask confirmation when the delete button is pressed of any item
  $('#billList').on('click', "#deleteDetails", function() {
      var sample_no = $(this).attr("value");
      if(confirm("Are you sure you want to delete this?")){
          deleteDetails(sample_no);
          $('#testTable').hide();
          $('.detail').hide();
      }
      else{
          return false;
      }
  });

//   This loads the test details of the given sample no
  function loadTestDetails(sample_no){
      
      $.post(
          showTestUrl,{sample_no},
          function(data){
              // data is returned by controller as array
              // which needed to be convert into javascript object
  
              data = JSON.parse(data); 
              var html = '';
              for(var i= 0; i < data.length; i++){
                  html += '<tr>' +
                  '<td>' + data[i].sample_no + '</td>' +
                  '<td>' + data[i].patient_id + '</td>' +
                  '<td>' + data[i].test_items + '</td>' +
                  '<td>' + data[i].quantity + '</td>' +
                  '<td>' + data[i].unit_price+ '</td>';
              }

              $('#testList').html(html);
          }
      );
  }

//   This function is to delete the details of the bill items and test items
  function deleteDetails(sampleno){
      
      $.post(removeUrl,{sampleno},
          function(response){
              response = JSON.parse(response);
              var msg;
              if(response.status == 'success'){
                  msg = '<div class="alert alert-success" role="alert">'+ response.message +
                  '</div>';
                  loadPatientsDetails();
              }else{
                  msg = '<div class="alert alert-danger" role="alert">'+ response.message +
                  '</div>';
              }
              $('#message').html(msg);
          });

          

  }
  });
