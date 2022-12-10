<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/patient.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title><?=$title?></title>

    <style>
   
    </style>
</head>
<body style="padding: 20px 20px; margin: 20px 20px; ">
    <div id="mySidepanel" class="sidepanel">
        <a class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?=base_url()?>patient/">Home</a>
        <a href="<?=base_url()?>patient/registerForm">Register-Patient</a>
        <a href="<?=base_url()?>patient/previewBills">Bills</a>
    </div>

    <button class="openbtn" onclick="openNav()">&#9776; Menu</button>
    
    <?=$output ?>
    

    <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
        }

        /* Set the width of the sidebar to 0 (hide it) */
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }
    </script>
    </head>
    <body>
    </script>

</body>
</html>