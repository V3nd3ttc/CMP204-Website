$(document).ready(function (){   
    $('body').on({
        mouseenter: function () {  
            $(this).css({"background-color":"#413C8C",
                "border-color": "#8F3CAB",
                "transition":"background-color 1s ease, border-color 1s ease"});;
        },
        mouseleave: function() {
            $(this).css({"background-color":"#413c8c42",
                "border-color": "#413C8C",
                "transition":"background-color 1s ease, border-color 1s ease"});
        }
    }, '.interactive'); 
    var hasRan = 0;
    $('#quotesButton').click(function() {  
        $.ajax({
            type: "POST",
            url: "quotes.php",
            dataType: "html",
            data: {'hasRan':hasRan},
            success : function(data) { 
                $('#quotes').append(data);
            }
        });
        hasRan += 1;
    });
    var toggled = 0;
    $('#helpButton').click(function(){ 
        if (toggled == 0) {
            $('#help').append("<p id = 'helpMessage'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique congue facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam at neque urna. Mauris consectetur ac tellus ut euismod. Suspendisse convallis efficitur lectus suscipit fermentum. Sed faucibus, massa vitae tempus convallis, metus dolor maximus elit, et consequat dolor elit id justo. Nullam ipsum tellus, ultricies vel augue at, vehicula rhoncus augue.<p>");
            toggled = 1;
        } else {
            $('#helpMessage').remove();
            toggled = 0;
        }        
    })
});