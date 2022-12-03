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
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>MCQ Quiz</h4><span id="viewedQuestion"></span></div>
                            <h4 id="timer" >Time Left | 20 sec </h4>
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
                        <button id="nextBtn" class="btn btn-primary border-success align-items-center btn-success" type="button" value="" >Next<i class="fa fa-angle-right ml-2"></i></button></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            // var page = Math.floor(Math.random() * 3) + 1;
            var page = 1;
            loadQuiz(page);

            var time = 20;
            var timeInterval;

            $('#prevBtn').click(function(){
                --page;
                clearInterval(timeInterval);
                btnWork();

            });
            $('#nextBtn').click(function(){
                ++page;
                clearInterval(timeInterval);
                btnWork();
            });

            function loadQuiz(page){
                var page = page;
                var url = "<?php echo base_url()."quiz/showQuiz" ?>";
                $.post(
                    url,{
                        page
                    },
                    function(data){
                        localStorage.setItem("Q"+page, data);
                        data = JSON.parse(data);
                        load(data);
                        
                    }
                );
            }

            function load(data){
                $('#viewedQuestion').attr("value", data['question'].question_id);
                $('#viewedQuestion').text('(' + data['question'].question_id + ' of 10)');
                $('#showquestion').text(data['question'].question);

                var html = '';
                html += ' <label class="radio"> ' +
                                '<input type="radio" name="answer" value="'+data['options'].option_one+ ' "> <span>' + data['options'].option_one + '</span>' +
                            '</label>' +
                        
                            '<label class="radio">' +
                                '<input type="radio" name="answer" value="'+ data['options'].option_two +'"> <span>'+ data['options'].option_two + '</span>' +
                            '</label>' +
                        
                            '<label class="radio"> ' +
                                '<input type="radio" name="answer" value="'+ data['options'].option_three +'"> <span>' + data['options'].option_three + '</span>' +
                            '</label>' +
                            '<label class="radio">' +
                                '<input type="radio" name="answer" value="'+ data['options'].option_four +'"> <span>' + data['options'].option_four + '</span>' +
                            '</label>' ;

                        $('.ans').html(html);

                        if(page == 1){
                            $('#prevBtn').hide();
                        }else if(page == 4){
                            $('#nextBtn').hide();
                        }else{
                            $('#nextBtn').show();
                            $('#prevBtn').show();
                         }
                        
                        time = 20;
                        timeInterval = setInterval(
                        function(){
                            if(time == 0){
                                clearInterval(timeInterval);
                            }else{
                                --time;
                                $('#timer').text("Time Left | " + time + " sec");
                            }
                        }, 1000);

                        // To mark as check when user visits pages

                        let answerChecked = JSON.parse(localStorage.getItem('answers'));
                        
                        if(answerChecked['q'+ data['question'].question_id]){

                            $('input[value="'+answerChecked['q'+ data['question'].question_id]+'"').attr("checked","");
                        }
                        // if($('input[name="answer"]').val() === answerChecked['q'+ data['question'].question_id]){
                        //     // $(this).attr("checked");
                            // console.log('ok');


            }

            function btnWork(){
                // This function checks whether the given questions and options are in localstorage or not
                // if the items are in database it calls load function
                // and if the items are not available then it calls from database
                let selectedValue = $('input[name="answer"]:checked').val();

                if(selectedValue){
                    //  Get the existing data
                    var existing = localStorage.getItem('answers');
    
                    // If no existing data, create an array
                    // Otherwise, convert the localStorage string to an array
                    existing = existing ? JSON.parse(existing) : {};
    
                    // index gets value from span tag from html
                    // to read current question number
                    var index =  $('#viewedQuestion').attr("value");
                    // if user checked the value
                    // Add new data to localStorage Array

                    existing['q' + index] = selectedValue;
                    // Save back to localStorage
                    localStorage.setItem('answers', JSON.stringify(existing));
                }

                if(localStorage.getItem("Q"+page)){
                    let data = JSON.parse(localStorage.getItem("Q"+page));
                    load(data);
                }else{
                    loadQuiz(page);
                }
                
            }
});
    </script>
</body>
</html>