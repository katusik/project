(function ($) {
    var time = setInterval(function () {
    var date = new Date();
    $('#time').html(date.getHours() + ":" + date.getMinutes());
}, 1000);

})(jQuery);



