<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">

    <div id="message"></div>
    <form action="">
        <div class="row">
            <div class="col-md-4 form-group">
                <lable>Employe Name</lable>
                <input type="text" class="form-control" name="EMPLOYENAME" id="employename" />
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe ID</lable>
                <input type="text" class="form-control" name="EMPLOYEID" id="employeid" />
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe Email</lable>
                <input type="text" class="form-control" name="EMPLOYEMAIL" id="employemail" />
            </div>

            <input type="button" value="Create" id="createBtn" />
        </div>
    </form>
        <table >
            <thead>

                <tr>
                    <th>EMPLOYEE NAME</th>
                    <th>EMPLOYEE ID</th>
                    <th>EMPLOYEE EMAIL</th>
                    <th>Action</th>

                </tr>
               
            </thead>
            <tbody id="listEmploye">
            </tbody>
        </table>

<script>
$(function() {
   
    getTableData();
    function getTableData(){
        
        var url = "<?php echo base_url()."employe/showEmployee" ?>";
        $.get(
            url,
            function(data){
                // data is returned by controller as array
                // which needed to be convert into javascript object
                data = JSON.parse(data); 
                var html = '';
                for(var i= 0; i < data.length; i++){
                    html += '<tr>' +
                    '<td>' + data[i].EMPLOYENAME + '</td>' +
                    '<td>' + data[i].EMPLOYEID + '</td>' +
                    '<td>' + data[i].EMPLOYEMAIL + '</td>' +
                    '<td><a href="/hmvc/employe/getUpdateForm?emp_id=' + data[i].EMPLOYEID +'"> Update </a></td>' +
                    '<td><a href="/hmvc/employe/deleteEmployee?emp_id=' + data[i].EMPLOYEID +'"> Delete </a></td></tr>';
                }
                
                $('#listEmploye').html(html);

                
            }
        );
            
    }
    
    $("#createBtn").click(function() {
        var employename = $("#employename").val();
        var employeid = $("#employeid").val();
        var employemail = $("#employemail").val();

        var url = "<?php echo base_url()."employe/saveEmployee" ?>";
        
        $.post(url, {
            employename,
            employeid,
            employemail
            },
            function(response){
                response = JSON.parse(response);
                if(response.status == 'success'){
                    alert(response.message);
                    location.reload(true);
                }
                else if(response.status == 'error'){
                    $("#message").html(response.message);
                    $('#message').css({
                        "backgroundColor" : "red",
                        "color" : "white",
                        "width" : "200px",

                    });
                 }else{
                    alert(response.message);
                 }
            }
        );
            
    });


});
    
    
    
    
    
</script>