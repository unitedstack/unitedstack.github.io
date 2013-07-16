$(function() {
    var $html = $('html'),
        $demo_panel = $('#demo-panel'),
        $background_tumblers = $('.demo-panel-backgrounds li');

    $('#demo-panel-activator').on('click', function(e) {
        e.preventDefault();

        $demo_panel.toggleClass('active');
    });

    $background_tumblers.on('click', function() {
        var $this = $(this);

        $background_tumblers.filter('.active').removeClass('active');
        $this.toggleClass('active');

        $html.css('background-image', 'url(./public/img/' + $this.data('image') + ')');
    });
});