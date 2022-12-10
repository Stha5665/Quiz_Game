$(function(){
    var items ={};
    var itemNo = 0;

    // Adding items to bill
    $('#add').click(function(){
      var testName = $('#testname').val();
      var unitPrice = $('#unitprice').val();
      var qty = $('#qty').val();
      var totalPrice = unitPrice * qty;
      var discountPercent = $('#discountPercent').val();
      var discount = (totalPrice * discountPercent)/100;
      var netAmount = totalPrice - discount;
      var patientID = $('#patientID').attr("name");

      $.post(addUrl,{
        testName, unitPrice, qty, totalPrice, discountPercent, discount, netAmount, patientID},
        function(response){
        response = JSON.parse(response);
        var msg;
        if(response.status == 'success'){
          // storing items details in json and loading the items through json
          
          items[itemNo] = {'sampleNo': response.sampleno, 'testName' : testName, 'unitPrice': unitPrice, 'qty': qty, 'totalPrice' : totalPrice,
          'discountPercent': discountPercent, 'discountAmount' : discount, 'netAmount' : netAmount};
          loadItems(items);
          ++itemNo;
          
          msg = '<div class="alert alert-success" role="alert">'+ response.message +
          '</div>';
        }else{
          msg = '<div class="alert alert-danger" role="alert">'+ response.message +
          '</div>';
        }
        $("#message").html(msg);
        
      });
       
    });

    $('#clear').click(function(){
      $('input').val('');
    });

    $(document).on('click', ".removeBtn", function() {
      var sampleno = $(this).attr("value");
      
      $.post(removeUrl,{sampleno},  function(response){
              response = JSON.parse(response);
              var msg;
              if(response.status == 'success'){
                  msg = '<div class="alert alert-success" role="alert">'+ response.message +
                  '</div>';
              }else{
                  msg = '<div class="alert alert-danger" role="alert">'+ response.message +
                  '</div>';
              }
              $('#message').html(msg);
            });

      // $(items).each(function (index){
      //   console.log(items[index].sampleNo);
      //   if(items[index].sampleNo == sampleno){
      //       items.splice(index,1);
      //       loadItems(items);
      //       console.log(items);
      //       console.log(itemNo); 
      //       return false; // This will stop the execution of jQuery each loop.
      //   }
      // });
      var i = 0;
      while (items[i]) {
        console.log(items[i].sampleNo);
        if(items[i].sampleNo == sampleno){
            delete items[i];
            --itemNo;
            loadItems(items);
        }
        i++;
      } 

    });

    function loadItems(data){
      var html = '';
      var i = 0;
      while (data[i]) {
          html += '<tr>' +
          '<td>' + (i+1) + '</td>' +
          '<td>' + data[i].testName + '</td>' +
          '<td>' + data[i].unitPrice + '</td>' +
          '<td>' + data[i].qty + '</td>' +
          '<td>' + data[i].totalPrice + '</td>' +
          '<td>' + data[i].discountPercent + '</td>' +
          '<td>' + data[i].discountAmount + '</td>' +
          '<td>' + data[i].netAmount + '</td>' +
          '<td><button type="button" value="'+ data[i].sampleNo +'" class="btn btn-warning removeBtn" >Remove</button>' +
          '</tr>';
          i++;
      }
      $('#billList').html(html);
    }

});
