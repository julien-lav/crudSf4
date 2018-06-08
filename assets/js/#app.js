require('../css/app.scss');

// Ici tous nôtre js
var $ = require('jquery');
var hello = require('./hello');

$(document).ready(function() {
    $('#current_name').prepend('<h1>'+hello(' $user!')+'</h1>');
});