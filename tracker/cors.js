$( document ).ready(function() {
    $.post('https://tracker/hit.php', function(data) {
        $('.hit-counter').text(data + ' hits');
    });

    $('.hit-counter').on('click', function(){
        $.ajax({
            url: "https://tracker/clear.php",
            type: 'PUT',
            xhrFields: {
                withCredentials: true
            }
        }).success(function() {
            $('.hit-counter').text('0 hits');
        });
    });
});