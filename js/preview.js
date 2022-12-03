$(function(){
    $('.preview').click(function(){
       
        var page1 = $(this).val();
    
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
            $.get(
                getAnsUrl,{
                    userId
                }, function(data){
                    data = JSON.parse(data);
                    answers['ans'] = data;
                }
            );
        }
    }

    // console.log(localStorage.getItem("answer", data))
    // for preview mode
    var page = 1;
     // this variable to store all the questions and options returned from database
    var dataFromDb = {};
    var answers = {};
    getAnswerSubmitted();
    loadQuiz(page);
   

    function checkAns(question_id){
        // if(!answer)

        $('.option[value="'+dataFromDb['Q'+question_id]['options'].answer+'"]').css({
                        'background' : 'grey',
                        'color' : 'white',
                        'border' : '1px solid #c3e6cb'});

        if(answers['ans']){

                if(dataFromDb['Q'+question_id]['options'].answer != answers['ans']['q'+question_id]){

                    $('.option[value="'+answers['ans']['q'+question_id]+'"]').css({
                        'background' : 'red',
                        'color' : 'white',
                        'border' : '1px solid #c3e6cb'});
                }
                else{
                    $('.option[value="'+answers['ans']['q'+question_id]+'"]').css({
                        'background' : 'green',
                        'color' : 'white',
                        'border' : '1px solid #c3e6cb'});

                }
        }




    }


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
        $('#viewedQuestion').attr("value", data['question'].question_id);
        $('#viewedQuestion').text('(' + data['question'].question_id + ' of 5)');
        $('#showquestion').text(data['question'].question);

        let option_tag = '<div class="option" value="'+data['options'].option_one+'"><span>'+ data['options'].option_one+ '</span></div>'
            + '<div class="option" value="'+data['options'].option_two+'"><span>'+ data['options'].option_two +'</span></div>'
            + '<div class="option" value="'+data['options'].option_three+'"><span>'+ data['options'].option_three +'</span></div>'
            + '<div class="option" value="'+data['options'].option_four+'"><span>'+ data['options'].option_four +'</span></div>';
                    
        $('.ans').html(option_tag);

        if(page == 1){
                    $('#prevBtn').hide();
                    $('#submit').hide();
                }else if(page == 5){
                    $('#nextBtn').hide();
                    $('#submit').show();
                }else{
                    $('#nextBtn').show();
                    $('#prevBtn').show();
                    $('#submit').hide();
                 }

        checkAns(data['question'].question_id); 
        
        
    }

    function btnWork(){
        if(dataFromDb['Q' + page]){
            load(dataFromDb['Q' + page]);
        }
        else{
            loadQuiz(page);
        }
    }

});
