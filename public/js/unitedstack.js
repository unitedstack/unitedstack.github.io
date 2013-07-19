$(document).ready(function() {
    var config;

    $.getJSON('config.json').done(function(data) {
        config = data;

        var date = new Date(config.countdown.year,
                            config.countdown.month - 1,
                            config.countdown.day,
                            config.countdown.hour,
                            config.countdown.minute,
                            config.countdown.second),
            $countdown = $('#countdown'),
            $countdown_numbers = {
                days: $('#countdown-days'),
                hours: $('#countdown-hours'),
                minutes: $('#countdown-minutes'),
                seconds: $('#countdown-seconds')
            },
            tab_focused = true;

        $(window).on('focus', function() {
            tab_focused = true;
        });

        $(window).on('blur', function() {
            tab_focused = false;
        });

        $.each($countdown_numbers, function() {
            var $this = $(this);

            $this.data({
                angle: 0,
                sides: {
                    current: $('.countdown-number-front', $this),
                    other: $('.countdown-number-back', $this)
                },
                current_side: 1
            });
        });

        $countdown.countdown(date, function(event) {
            if (event.type == 'finished') {
                $countdown.hide();
            } else if (tab_focused) {
                var $tile,
                    $current_side,
                    $other_side,
                    angle,
                    timer;

                $tile = $countdown_numbers[event.type];

                if (!$tile) {
                    return;
                }

                $current_side = $tile.data('sides').current;
                $other_side = $tile.data('sides').other;

                angle = $tile.data('angle') + 180;
                $tile.css('transform', 'rotateY(' + angle + 'deg)').data('angle', angle);

                $other_side.text(event.value);

                timer = setTimeout(function() {
                    $current_side.hide();
                    $other_side.show();
                    $tile.data('sides', {
                        current: $other_side,
                        other: $current_side
                    });

                    clearTimeout(timer);
                }, 250);
            }
        });

        var messages = config.subscription_form_tooltips,
            error = false,
            $form = $('#subscription-form'),
            $email = $('#subscription-email'),
            $button = $('#subscription-submit'),
            $tooltip;

        function renderTooltip(type, message) {
            var offset;

            if (!$tooltip) {
                $tooltip = $('<p id="subscription-tooltip" class="subscription-tooltip"></p>').appendTo($form);
            }

            if (type == 'success') {
                $tooltip.removeClass('error').addClass('success');
            } else {
                $tooltip.removeClass('success').addClass('error');
            }

            $tooltip.text(message).fadeTo(0, 0);
            offset = $tooltip.outerWidth() / 2;
            $tooltip.css('margin-left', -offset).animate({top: '100%'}, 200).dequeue().fadeTo(200, 1);
        }

        function hideTooltip() {
            if ($tooltip) {
                $tooltip.animate({top: '120%'}, 200).dequeue().fadeTo(100, 0);
            }
        }

        function changeFormState(type, message) {
            $email.removeClass('success error');

            if (type == 'normal') {
                hideTooltip();
            } else {
                renderTooltip(type, message);
                $email.addClass(type);
            }
        }

        $form.submit(function(event) {
            event.preventDefault();

            var email = $email.val();

            if (email.length == 0) {
                changeFormState('error', messages['empty_email']);
            } else {
                $.post('./admin/index.php?page=subscribe', {
                    'email': email,
                    'ajax': 1
                }, function(data) {
                    if (data.status == 'success') {
                        changeFormState('success', messages['success']);
                    } else {
                        switch(data.error) {
                            case 'empty_email':
                            case 'invalid_email':
                            case 'already_subscribed':
                                changeFormState('error', messages[data.error]);
                                break;

                            default:
                                changeFormState('error', messages['default_error'])
                                break;
                        }
                    }
                }, 'json');
            }
        });

        $email.on('change focus click keydown', function() {
            if ($email.val().length > 0) {
                changeFormState('normal');
            }
        });
    });
});