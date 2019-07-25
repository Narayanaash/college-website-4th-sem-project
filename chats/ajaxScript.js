$(document).ready(function(){ 
    
    var content = null;
    
    displayCommentOnReload();
    
       $('#comment-send-btn').click(function(){
        

       
        var comment = $("#comment-box").val();

        $.ajax({
            url: "comment-box-back.php",
            type: "POST",
            async: false,
            data: {
                
                "comment-box": comment
            },
            success: function(data){
                displayCommentOnReload();
                $("#comment-box").val(data);
            }
        });
        
});
    
});


function displayComment(){
    
    if(!$.active){
    $.ajax({
       
            url: "getComment.php",
            type: "POST",
            async: false,
            data: {
                "display": 1
            },
            success: function(data2){
                
                content += data2;

                $("#put_comments").html(content);
                
            }
    });
}
}

function displayTypingStatus(){
    
           if(!$.active){
           $.ajax({
       
            url: "getTypingStatus.php",
            type: "POST",
            async: false,
            data: {
                "display": 1
            },
            success: function(data3){

                $("#typing").html(data3);
            }
    });
}
}

function  displayCommentOnReload(){
    
     $.ajax({
       
            url: "getCommentOnReload.php",
            type: "POST",
            async: false,
            data: {
                "display": 1
            },
            success: function(data5){

                $("#put_comments").html(data5);
                var $t = $('.commentSpace');
                $t.animate({"scrollTop": $('.commentSpace')[0].scrollHeight}, "normal");
            }
    });
    
}