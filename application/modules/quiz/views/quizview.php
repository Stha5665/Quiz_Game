<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title><?=$title?></title>
</head>
<body>
<div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border bg-white p-3 border-bottom">
                    <div id="info-card" class="d-flex justify-content-center align-items-center" style="height: 250px; text-align:center; flex-direction: column;">
                        <h4>Enter Your Name:</h4>
                        <input type="text" id="username"/>
                        <button type="button" class="btn btn-primary" id="playBtn" style="margin-top: 10px;">Play</button></td>
               
                    </div>
                </div>
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>Quiz Game</h4>
                            <h5 id="viewedQuestion"></h5>
                            <span id="timer" >Time Left | 20 sec </span>
                        </div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q.</h3>
                            <h5 class="mt-1 ml-2" id="showquestion"></h5>
                        </div>
                        <div class="ans ml-2 d-flex flex-column">
                     
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white" id="pagination">
                        <button id="prevBtn" class="btn btn-primary align-items-center btn-danger" type="button" value=""><i class="fa fa-angle-left mt-1 mr-1"></i>previous</button>
                        <button id="nextBtn" class="btn btn-primary border-success align-items-center btn-success" type="button" value="" >Next<i class="fa fa-angle-right ml-2"></i></button>
                        <button id="submit" class="btn btn-primary border-success align-items-center btn-success" type="button" value="" >Submit<i class="fa fa-angle-right ml-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            var loadurl = "<?php echo base_url()."quiz/showQuiz" ?>";
            var saveurl = "<?php echo base_url()."quiz/saveAnswer"?>";

    </script>

    <script src="<?php echo base_url();?>js/quiz.js"> </script>
</body>
</html>