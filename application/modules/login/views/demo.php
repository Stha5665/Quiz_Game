<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title><?=$title?></title>

    <style>
        .option{
            background: aliceblue;
            border: 1px solid #84c5fe;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 17px;
            margin-bottom: 15px;
            /* display: flex;
            align-items: center;
            justify-content: space-between; */
            pointer-events: none;
            width: 150px;
    }
    .option:hover{
        color: #004085;
        background: #cce5ff;
        border: 1px solid #b8daff;
    }

    .option.correct{
        color: #155724;
        background: #d4edda;
        border: 1px solid #c3e6cb;
    }

    </style>
</head>
<body style="padding: 20px 20px; margin: 20px 20px; ">
    <?=$output ?>
    <script>
        $(function(){
            var page1;
            $('.preview').click(function(){
                page1 = $(this).val();
                
                var url = "<?php echo base_url()."login/preview"?>" ;
                $.get(
                    url,{
                        page1
                    }, function(data){
                        window.location.href = url;
                        localStorage.setItem("userId", page1);
                    }
                );
                
            });

            
            function getAnswerSubmitted(){
                var userId = localStorage.getItem("userId");

                if(userId){

                    var url = "<?php echo base_url()."login/preview/getSubmitedAnswer"?>" ;
                    $.get(
                        url,{
                            userId
                        }, function(data){
                            data = JSON.parse(data);
                            submitedAns['Q'+userId] = data;
                        }
                    );
                }

            }

            // for preview mode
            var submitedAns = {};
            var page = 1;
            loadQuiz(page);
            // this variable to store all the questions and options returned from database
            var dataFromDb = {};
            var answers = {};
            console.log(dataFromDb);
            

            $('#prevBtn').click(function(){
                --page;
                btnWork();

            });
            $('#nextBtn').click(function(){
                ++page;
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
                        data = JSON.parse(data);
                        dataFromDb['Q'+page] = data;
                        load(data);
                        getAnswerSubmitted();
                    }
                );
            }

            function load(data){
                $('#viewedQuestion').attr("value", data['question'].question_id);
                $('#viewedQuestion').text('(' + data['question'].question_id + ' of 10)');
                $('#showquestion').text(data['question'].question);

                let option_tag = '<div class="option" value="'+data['options'].option_one+'"><span>'+ data['options'].option_one+ '</span></div>'
                    + '<div class="option" value="'+data['options'].option_two+'"><span>'+ data['options'].option_two +'</span></div>'
                    + '<div class="option" value="'+data['options'].option_three+'"><span>'+ data['options'].option_three +'</span></div>'
                    + '<div class="option" value="'+data['options'].option_four+'"><span>'+ data['options'].option_four +'</span></div>';
                            
                $('.ans').html(option_tag);

                if(page == 1){
                            $('#prevBtn').hide();
                            $('#submit').hide();
                        }else if(page == 4){
                            $('#nextBtn').hide();
                            $('#submit').show();
                        }else{
                            $('#nextBtn').show();
                            $('#prevBtn').show();
                            $('#submit').hide();
                         }

                $('.option[value="'+data['options'].answer +'"]').css({
                    'background' : 'green',
                    'color' : 'white',
                    'border' : '1px solid #c3e6cb'});
            }

            function btnWork(){
                if(dataFromDb['Q' + page]){
                    load(dataFromDb['Q' + page]);
                }else{
                    loadQuiz(page);
                }
            }
        });
    </script>
</body>
</html>