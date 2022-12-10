$(function(){
    $('.border:last').hide();
    $('#playBtn').click(function(){
        $('.border:first').hide();
        $('.border:last').show();
        // var page = Math.floor(Math.random() * 3) + 1;
        var page = 1;
        loadQuiz(page);
        // this variable to store all the questions and options returned from database
        var dataFromDb = {};
        var answers = {};
        var time = 20;
        var previousTime;
        var timeInterval = 0;
        var totalScore = 0;
        var timeTaken = 0;
        var totalQuestion = 5;

        $('#prevBtn').click(function(){
            --page;
            clearInterval(timeInterval);
            time = previousTime;
            btnWork();

        });
        $('#nextBtn').click(function(){
            ++page;
            clearInterval(timeInterval);
            timeTaken += (20-time);
            previousTime = time;
            btnWork();
            
        });

        $('#submit').click(function(){
            clearInterval(timeInterval);
            btnWork();
            // checking answer
            checkAnswer();
            $('.question:first').html('<h1> Total Score </h1>');
            $('.question:last').html('<h3> Hello, Your total Score: ' + totalScore +  ' </h3>');
            $('#prevBtn, #submit').hide();
            saveToDatabase();
        });
        function loadQuiz(page){
            // console.log("loaded from db");
            var page = page;
            // var url = "<?php echo base_url()."quiz/showQuiz" ?>";
            $.post(
                loadurl,{
                    page
                },
                function(data){
                    data = JSON.parse(data);
                    dataFromDb['Q'+page] = data;
                    load(data);
                    
                    
                }
            );
        }

        function load(data){
            // console.log('loaded from array');
            $('#viewedQuestion').attr("value", data['question'].question_id);
            $('#viewedQuestion').text('(' + data['question'].question_id + ' of ' + totalQuestion+')');
            $('#showquestion').text(data['question'].question);

            var html = '';
            html += ' <label class="radio"> ' +
                            '<input type="radio" name="answer" value="'+data['options'].option_one+ '"> <span>' + data['options'].option_one + '</span>' +
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
                        $('#submit').hide();
                    }else if(page == totalQuestion){
                        $('#nextBtn').hide();
                        $('#submit').show();
                    }else{
                        $('#nextBtn').show();
                        $('#prevBtn').show();
                        $('#submit').hide();
                    }
                    
                    timeInterval = setInterval(
                    function(){
                        if(time == 0){
                            clearInterval(timeInterval);
                            $('#prevBtn').hide();
                        }else{
                            --time;
                            $('#timer').text("Time Left | " + time + " sec");
                        }
                    }, 1000);

                    // To mark as check when user visits pages

                    let answerChecked = JSON.parse(localStorage.getItem('answers'));
                    
                    if(answers['q' + data['question'].question_id]){

                        $('input[value="'+answers['q'+ data['question'].question_id]+'"').attr("checked","");
                    }

        }

        function btnWork(){
            // This function checks whether the given questions and options are in localstorage or not
            // if the items are in database it calls load function
            // and if the items are not available then it calls from database
            let selectedValue = $('input[name="answer"]:checked').val();
            
            if(selectedValue){
                // index gets value from span tag from html
                // to read current question number
                var index =  $('#viewedQuestion').attr("value");


                // //  Get the existing data
                // var existing = localStorage.getItem('answers');

                // // If no existing data, create an array
                
                // // Otherwise, convert the localStorage string to an array
                // existing = existing ? JSON.parse(existing) : {};

                // // if user checked the value
                // // Add new data to localStorage Array

                // existing['q' + index] = selectedValue;
                // // Save back to localStorage
                // localStorage.setItem('answers', JSON.stringify(existing));
                
                answers['q' + index] = selectedValue;
                // console.log(answers);
            //    console.log(dataFromDb);
            }

            if(dataFromDb['Q' + page]){
                load(dataFromDb['Q' + page]);
            }else{
                time = 20;
                loadQuiz(page);
            }
        }

        function checkAnswer(){
            
            for(var i=1; i<= totalQuestion; i++){
            if( dataFromDb['Q' + i]['options'].answer == answers['q'+i]){
                totalScore += 1;
                
                console.log('Total Score ' + totalScore);
            }
            }


        }

        function saveToDatabase(){
            var username = $('#username').val();
            // var url = "<?php echo base_url()."quiz/saveAnswer"?>";
            // var saveurl = "<?php echo base_url()."quiz/saveAnswer"?>";
            var totalTime = timeTaken;
            var attempted =  Object.keys(answers).length;
            var mark = totalScore + "/" + attempted + "/" + totalQuestion;
            
            if(!$.isEmptyObject(answers)){
                var answer = JSON.stringify(answers);
                $.post(saveurl, {
                    answer,
                    totalScore,
                    username,
                    totalTime,
                    mark
                },
                function(response){
                    console.log(response);
                });
            }


        }
    });
});
