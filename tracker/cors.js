$( document ).ready(function() {
    $.post('https://tracker/hit.php', function(data) {
        $('.hit-counter').text(data + ' hits');
    });

    $.ajaxSetup({
        xhrFields: {
            withCredentials: true
        }
    });
    $('.hit-counter').on('click', function(){
        $.post('https://tracker/clear.php', function(data) {
            $('.hit-counter').text('0 hits');
        });
    });
});