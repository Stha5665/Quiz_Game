$(function(){
    getAllCountry();

    // Fetching all the country and showing in dropdown
    function getAllCountry(){
      var provinceData = {};
      var municipalityData = {};
      $('#province').parent().hide();
      $('#municipality').parent().hide();

      var url = "http://localhost/hmvc/patient/register/getAllCountry";
      $.get(
        url,
        function(data){
          data = JSON.parse(data);
          var html="<option selected disabled>Choose a country</option>";
          for(var i= 0; i < data.length; i++){

            html += "<option value="+data[i].country_id+">" + data[i].country_name+"</option>";
          }
          $('#country').html(html);
        }
      );

      // To show provinces of that country
      $('#country').change(function(){
        var countryID = ($('#country').val());
        // var countryID = $(this).find('option:selected').text();

  
        if($.isEmptyObject(provinceData['provinces' + countryID])){
           var url = "http://localhost/hmvc/patient/register/getProvinces";

          $.post(url,{
              countryID
            },
            function(data){
              data = JSON.parse(data);
              provinceData['provinces' + countryID] = data;
              $('#province').parent().show();
              loadProvince(data);
            }
          );   
        }else{
          loadProvince(provinceData['provinces' + countryID]);
        }

      });
       
      // When the province is selected, municipalities of that province are shown

      $('#province').change(function(){
        var provinceID = ($('#province').val());
        // var countryID = $(this).find('option:selected').text();
        if($.isEmptyObject(municipalityData['municipalities' + provinceID])){
          var url = "http://localhost/hmvc/patient/register/getMunicipalities";

          $.post(url,{
              provinceID
            },
            function(data){
              data = JSON.parse(data);
              municipalityData['municipalities'+provinceID] = data;
              $('#municipality').parent().show();
              loadMunicipality(data);
              // console.log('load from db');
              
            }
          );
        }else{
          // console.log('load from json');
          // console.log(municipalityData);
          loadMunicipality(municipalityData['municipalities'+provinceID]);
        }

      });

      // This loads all provinces
      function loadProvince(data){
        var html="<option selected disabled>Choose a province</option>";
            for(var i= 0; i < data.length; i++){
              html += "<option value="+data[i].province_id+">" + data[i].province_name+"</option>";
            }
            $('#province').html(html);
      }

      // This loads all municipalities
      function loadMunicipality(data){
        var html="<option selected disabled>Choose a municipality</option>";
            for(var i= 0; i < data.length; i++){
              html += "<option value="+data[i].municipality_name+">" + data[i].municipality_name+"</option>";
            }
            $('#municipality').html(html);
      }
  }

// When the register button is pressed
// It checks for validation and if all data are valid
// The patient are stored in database
  $('#register').click(function(){
    var name = $('#name').val();
    var age = $('#age').val();
    var gender = $('input[name="gender"]:checked').val();
    var country = $('#country').find('option:selected').text();

    var province = $('#province').find('option:selected').text();
    var municipality = $('#municipality').val();
    var address = $('#address').val();
    var phoneno = $('#phoneno').val();
    var language = [];

    $('input[name="language"]:checked').each(function(){
      language.push(this.value);
    });
    var url = "http://localhost/hmvc/patient/register/savePatient";
    $.post(url,{
      name, age, gender, country, province, municipality, address, phoneno, language
    } ,function(response){
      response = JSON.parse(response);
      var msg;
      if(response.status == 'success'){
        msg = '<div class="alert alert-success" role="alert">'+ response.message +
        '</div>';
      }else{
        msg = '<div class="alert alert-danger" role="alert">'+ response.message +
        '</div>';
      }
      $("#message").html(msg);
    });
     

  });

});