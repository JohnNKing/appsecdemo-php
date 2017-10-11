$( document ).ready(function() {
    $.post('https://tracker/hit.php', function(data) {
        $('.hit-counter').text(data + ' hits');
    });
});