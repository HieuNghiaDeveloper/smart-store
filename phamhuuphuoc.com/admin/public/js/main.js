$(document).ready(function () {

    // SCROLL đến phần tử 
    // var cat_id = $("#scroll-item").attr('href');
    // if(cat_id != 0 || cat_id != ""){
    //     $('.table-responsive').animate({
    //         scrollTop: $(cat_id).offset().top
    //       }, '500');
    // }
    // TOGGLE NOTIFY
    $deep = $("#wp-container").attr('deep');
    if($deep == "deep"){
        $("#container").addClass('deep');
        $("#wp-container").addClass('toggle');
    }
    $("#accept").click(function(){
        if($("#wp-container").hasClass('toggle')){
            $("#container").removeClass('deep');
            $("#wp-container").removeClass('toggle');
            $(".child-result").css('display', 'none');
        }
    })
    $("#close").click(function(){
        if($("#wp-container").hasClass('toggle')){
            $("#container").removeClass('deep');
            $("#wp-container").removeClass('toggle');
        }
    })
    // TOGGLE LIST RESULT
    $(".parent-result").click(function(){
        $(".child-result").stop().slideToggle(250);
    })
    // $(".parent-result").hover(function(){
    //     $(".child-result").stop().fadeToggle(250);
    // })


    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

//  CHECK ALL
    $('input[name="checkAll"]').click(function () {
        var status = $(this).prop('checked');
        $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
    });


// EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function () {
        if (!$(this).parent('li').hasClass('active')) {
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });
});