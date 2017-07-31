$(document).ready(function () {
    var $input = $('#input'),
        $screen = $('#screen');
    $input.focus();
    $input.initResizeScreen();
    $.initAutoComplete();
    $('#run').click(function () {
        $.sendCommand()
    });
    $('#help').click(function () {
        $input.text('help');
        $.sendCommand()
    });
    $('#clear').click(function () {
        $screen.html('')
    });
    $input.captureEnter(function () {
        $.sendCommand()
    });
});

$(window).load(function(){
    var windowHeight = $(window).height();
    $('.main-wrapper').height(windowHeight - 150);
});