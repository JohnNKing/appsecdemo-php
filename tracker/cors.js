$( document ).ready(function() {

    // DEMO: CORS Vulnerability #1
    // UNSAFE
    $.post('https://tracker/cors-hit.php', function(data) {
        $('.hit-counter').text(data + ' hits');
    });

    // SAFE
    // $.ajax({
    //     url: 'https://tracker/cors-hit.php',
    //     type: 'PUT'
    // }).success(function(data) {
    //     $('.hit-counter').text(data + ' hits');
    // });

    $('.hit-counter').on('click', function(){
        $.ajax({
            url: 'https://tracker/clear.php',
            type: 'DELETE',
            xhrFields: {
                withCredentials: true
            }
        }).success(function() {
            $('.hit-counter').text('0 hits');
        });
    });
});