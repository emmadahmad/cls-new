$(function () {

    // START MULTIPLE EXPAND/COLLAPSE

    $('a[data-toggle="collapse"]').on('click',function(){

        var objectID=$(this).attr('href');

        if($(objectID).hasClass('in')){

            $(objectID).collapse('hide');

        }

        else{

            $(objectID).collapse('show');

        }

    });
    
    
    $('#expandAll').on('click',function(){

        $('a[data-toggle="collapse"]').each(function(){

            var objectID=$(this).attr('href');

            if($(objectID).hasClass('in')===false)

            {

                $(objectID).collapse('show');

            }

        });

    });
    
    $('#collapseAll').on('click',function(){
        
        $('a[data-toggle="collapse"]').each(function(){
    
            var objectID=$(this).attr('href');
    
            $(objectID).collapse('hide');
    
        });
    
    });

    $("#active_search").click(function() {
    
        $("#main_search").addClass("active_search");
    
    });

    $("#close_search").click(function() {
    
        $("#main_search").removeClass("active_search");
    
    });


    // MAIN COURSES BROWSE NAVIGATION
    $(function(){

        setSizeAlerts();

        $(window).resize(function(){

            setSizeAlerts();

        });

    });

    function setSizeAlerts() {

        if ($(window).width() > 667){

            $(".mainMenu > li.has_dropdown").bind('mouseenter', function(event) {

                $(this).children('.mega_menu_home').addClass('active');
             
                $(this).children('ul').slideDown(400);

                $(".mainMenu > li.has_dropdown").mouseleave(function() {

                    $(this).children('.mega_menu_home').removeClass('active');
         
                    $(this).children('ul').slideUp(400);
                    

                });
                
            });

            $(".mainMenu > li.has_dropdown > ul > li.has_dropdown").mouseenter(function() {
            
                $(this).find('ul').show(400, function(){
                    //on show complete
                });

                $(".mainMenu > li.has_dropdown > ul > li.has_dropdown").mouseleave(function() {
            
                    $(this).find('ul').hide(400, function(){
                        //on hide complete
                    });
                
                });
            
            });
            

        }else{

            $(".mainMenu > li.has_dropdown > .mega_menu_home").click(function() {
             
                $(this).next().toggle(400);
            
            });

            $(".mainMenu > li.has_dropdown > ul > li.has_dropdown").click(function() {
            
                $(this).find('ul').toggle(400);
            
            });

        }

    }

    $('.expandCollapseBtn a').click(function(){
        
        $(".expandCollapseBtn").find("a").removeClass('active_tab');

        $(this).addClass('active_tab');
    
    });

    // START ADD NEW CHAPTER POPUP FUNCTION
    $("#add_chapter_btn").click(function() {

        $("#add_chapter_popup").parent().addClass('active');

    });

    $("#cancel_chapter_btn").click(function() {

        $("#add_chapter_popup").parent().removeClass('active');

    });
    
    $("#cancel_lesson_btn").click(function() {

        $("#add_lesson_popup").parent().removeClass('active');

    });
    
});