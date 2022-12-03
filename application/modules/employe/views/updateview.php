<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div id="message"></div>
    <a href="/hmvc/employe/"> homepage</a> 
    <form action="">
        <div class="row">
            <div class="col-md-4 form-group">
                <lable>Employe Name</lable>
                <input type="text" class="form-control" name="EMPLOYENAME" id="employename" value="<?=$emp->EMPLOYENAME?>">
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe ID</lable>
                <input type="text" class="form-control" name="EMPLOYEID" id="employeid" value="<?=$emp->EMPLOYEID?>"/>
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe Email</lable>
                <input type="text" class="form-control" name="EMPLOYEMAIL" id="employemail" value="<?=$emp->EMPLOYEMAIL?>"/>
            </div>

            <input type="button" value="Update" id="updateBtn" />
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $("#updateBtn").click(function(){
            var employename = $("#employename").val();
            var employeid = $("#employeid").val();
            var employemail = $("#employemail").val();

            var url = "<?php echo base_url()."employe/saveEmployee" ?>";

            $.post(url,{
                employename,
                employeid,
                employemail
            },
            function(checkdata){
                checkdata = JSON.parse(checkdata);

                if(checkdata.status == "success"){
                    alert("Data Updated");
                } else{
                    $("#message").html(checkdata.message);
                }
            });
        });
    });
</script>