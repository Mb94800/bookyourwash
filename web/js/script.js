$( function() {
    $( "#dialog" ).dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        }
    });

    $( "#opener" ).on( "click", function() {
        $( "#dialog" ).dialog( "open" );
    });


        $( "#tabs" ).tabs();

    $(".cross" ).hide();

    $('.hamburger').hide();

    $(window).resize(function() {
        if($(window).width() < 650){



            $('.hamburger').show();
        }
    });


    $(".DCgeolocation__topopeninghours").click(function() {
        $(this).find(".openinghours__days").slideToggle("slow",function(){

        });

    });




    $( ".hamburger" ).click(function() {
        $( ".menutoggles" ).slideToggle( "slow", function() {
            $( ".hamburger" ).hide();
            $( ".cross" ).show();
        });
    });

    $( ".cross" ).click(function() {
        $( ".menutoggles" ).slideToggle( "slow", function() {
            $( ".cross" ).hide();
            $( ".hamburger" ).show();
        });
    });
} );