$.extend({
    getInput: function () {
        return $('#input').text();
    },
    clearInput: function () {
        $('#input').html('');
    },
    toggleBlock: function () {
        var $input = $('#input');
        if ($input.attr('blocked')) {
            $input.attr('contenteditable',true);
            $input.attr('blocked',false);
            $input.focus();
        } else {
            $input.attr('contenteditable',false);
            $input.attr('blocked',true);
        }
    },
    sendCommand: function () {
        var $input = $('#input'),
            $screen = $('#screen');
        $.toggleBlock();
        $.ajax({
            url: window.common.run_url,
            method: 'POST',
            data: {
                _token:  window.common._token,
                command: $.getInput()
            },
            success: function(result){
                $.toggleBlock();
                $screen.append(result.html);
                $screen.scrollTop($screen[0].scrollHeight);
            },
            error: function (result) {
                $screen.append(result.responseJSON.html);
                $.toggleBlock();
                $screen.scrollTop($screen[0].scrollHeight);
            }
        });
        $.clearInput();
        $screen.css('padding-bottom',$input.height());
    },
    initAutoComplete: function () {
        window.savedTree = [];
        window.index = 0;
    }
});
$.fn.extend({
    captureEnter: function (callback) {
        $(this).on('keydown', function(e) {
            if(e.keyCode == 13)  {
                e.preventDefault();
                callback();
            }
        });
    },
    initResizeScreen: function () {
        var $input  = $(this),
            $screen = $('#screen');
        $input.on('keydown, keyup', function() {
            $screen.css('padding-bottom',$input.height());
            $screen.scrollTop($screen[0].scrollHeight);
        });
    },
});