<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/preview.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title><?=$title?></title>

    <style>
   
    </style>
</head>
<body style="padding: 20px 20px; margin: 20px 20px; ">
    <?=$output ?>
    <script>
         var url = "<?php echo base_url()."login/preview"?>" ;
         var getAnsUrl = "<?php echo base_url()."login/preview/getSubmitedAnswer"?>" ;
         var loadurl = "<?php echo base_url()."quiz/showQuiz" ?>";
    </script>
    <script src="<?php echo base_url();?>js/preview.js"> </script>

</body>
</html>