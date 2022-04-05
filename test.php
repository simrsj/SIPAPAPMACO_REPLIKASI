<style>
    /*-- Preloader --*/
    #elastic-preloader {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 1000000000000000000000000000000002;
        background: #FFF;
    }

    #elastic-preloader h1 {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1000000000000000000000000000000003;
        width: 100%;
        height: 250px;
        line-height: 1;
        margin: auto;
        font-size: 250px;
        text-align: center;
    }

    #elastic-preloader h1:after {
        content: "%";
        padding-left: 30px;
        font-size: 80px;
        font-weight: normal;
    }

    .mfp-close,
    .mfp-arrow,
    .mfp-preloader,
    .mfp-counter {
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none
    }

    .mfp-loading.mfp-figure {
        display: none
    }

    .mfp-hide {
        display: none !important
    }

    .mfp-preloader {
        color: #CCC;
        position: absolute;
        top: 50%;
        width: auto;
        text-align: center;
        margin-top: -.8em;
        left: 8px;
        right: 8px;
        z-index: 1044
    }

    .mfp-preloader a {
        color: #CCC
    }

    .mfp-preloader a:hover {
        color: #FFF
    }

    .mfp-s-ready .mfp-preloader {
        display: none
    }

    /* Item Preloader */
    #item-preloader {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 1000000000000000000000000000000006;
        padding-top: 25%;
        background: #FFF;
    }

    #preloader_1 {
        position: relative;
        z-index: 1000000000000000000000000000000007;
        width: 106px;
        margin: 0 auto;
    }

    #preloader_1 span {
        display: block;
        bottom: 0px;
        width: 18px;
        height: 10px;
        background: rgba(0, 0, 0, 0.5);
        ;
        position: absolute;
        animation: preloader_1 1.5s infinite ease-in-out;
    }

    #preloader_1 span:nth-child(2) {
        left: 22px;
        animation-delay: .2s;
    }

    #preloader_1 span:nth-child(3) {
        left: 44px;
        animation-delay: .4s;
    }

    #preloader_1 span:nth-child(4) {
        left: 66px;
        animation-delay: .6s;
    }

    #preloader_1 span:nth-child(5) {
        left: 88px;
        animation-delay: .8s;
    }

    @keyframes preloader_1 {
        0% {
            height: 10px;
            transform: translateY(0px);
            background: rgba(0, 0, 0, 0.5);
        }

        25% {
            height: 60px;
            transform: translateY(15px);
            background: rgba(0, 0, 0, 1);
        }

        50% {
            height: 10px;
            transform: translateY(0px);
            background: rgba(0, 0, 0, 0.5);
        }

        100% {
            height: 10px;
            transform: translateY(0px);
            background: rgba(0, 0, 0, 0.5);
        }
    }
</style>
<div id="elastic-preloader"></div>

<h1>Thats it, <a href="?test" class="btn">try again</a></h1>
<script>
    (function($) {
        "use strict";

        var window_height = $(window).height();
        var window_width = $(window).width();

        /* document.ready
        ==================*/
        $(document).ready(function() {

            /*  PRELOADER
            ================================================*/
            var preloader = '#elastic-preloader';
            var percentage = 0;
            var array_of_images = $('img').toArray();
            var number_of_images = array_of_images.length;
            var one_step = 100 / number_of_images;
            var one_step = one_step.toFixed(2);
            var one_step = parseFloat(one_step);
            if ($(preloader).length != 0) {
                $(preloader).append('<h1>0</h1>');
                var imgLoad = imagesLoaded('body');
                //Change percentage after each image has been loaded
                imagesLoaded('body').on('progress', function(instance, image) {
                    percentage = percentage + one_step;
                    percentage = percentage.toFixed(0);
                    percentage = parseFloat(percentage);
                    $('#elastic-preloader h1').text(percentage);

                });
            }


            /*  MENU SYSTEM
            ================================================*/

            /* Scroll Navigation */
            $('a.scroll').click(function(e) {
                e.preventDefault();
                var id = $(this).attr("href");
                $('html,body').stop().animate({
                    scrollTop: $("div" + id).offset().top
                }, 'slow', function() {
                    //Close panel if opened
                    if ($('#side_menu_panel').length != 0) {
                        $('#side_menu_panel').animate({
                            'right': '-300px'
                        }, 200, 'linear', function() {
                            $('#side_overlay').fadeOut(300);
                        });
                    }
                    //Close overlay if opened
                    if ($('#elastic_overlay_menu').length != 0) {
                        $('#elastic_overlay_menu').fadeOut(300);
                    }
                });
            });

            /* Open Overlay Menu */
            $('.open-overlay').click(function(e) {
                e.preventDefault();
                $('#elastic_overlay_menu').fadeIn(300, function() {
                    var count = $('#elastic_overlay_menu div.menu ul').children().length;
                    //if ( count <= 4 ) { var menu_height = 300; }
                    //if ( count => 4 ) { var menu_height = 400; }
                    //if ( count => 7 ) { var menu_height = 600; }
                    if ((window_height > 770) && (count > 4)) {
                        var menu_height = window_height * 0.6;
                    }
                    if ((window_height > 770) && (count < 4)) {
                        var menu_height = window_height * 0.25;
                    }
                    if ((window_height < 770) && (count > 4)) {
                        var menu_height = window_height * 0.7;
                    }
                    if ((window_height < 770) && (count < 4)) {
                        var menu_height = window_height * 0.35;
                    }
                    if ((window_height < 550) && (count > 4)) {
                        var menu_height = window_height * 0.85;
                    }
                    if ((window_height < 550) && (count < 4)) {
                        var menu_height = window_height * 0.5;
                    }
                    var menu_item_height = menu_height / count;
                    $('#elastic_overlay_menu div.menu ul').css({
                        'height': menu_height,
                        'position': 'absolute',
                        'top': '0',
                        'left': '0',
                        'right': '0',
                        'bottom': '0',
                        'margin': 'auto'
                    });
                    $('#elastic_overlay_menu div.menu ul li').css({
                        'height': menu_item_height + 'px',
                        'line-height': menu_item_height + 'px'
                    });
                    $('#elastic_overlay_menu div.menu').fadeIn(300);
                });

            });

            /* Close Overlay Menu */
            $('#close-overlay').click(function(e) {
                e.preventDefault();
                $('#elastic_overlay_menu').fadeOut(300);
            });

            /* Open Side Panel */
            $('.open-panel').click(function(e) {
                e.preventDefault();
                $('#side_overlay').fadeIn(300, function() {
                    $('#side_menu_panel').animate({
                        'right': '0px'
                    }, 200, 'linear');

                });
            });

            /* Close Side Panel */
            $('#close-panel').click(function(e) {
                e.preventDefault();
                $('#side_menu_panel').animate({
                    'right': '-300px'
                }, 200, 'linear', function() {
                    $('#side_overlay').fadeOut(300);
                });
            });

            /* Open Sub Menu */
            $('#side_menu_panel div.menu ul li a.parent-link').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('italic');
                var $subMenuContainer = $(this).parent().find('ul').first();
                $subMenuContainer.slideToggle('slow');
            });

            /*  VIDEO BACKGROUNDS
            ================================================*/
            if ($('.video_bg').length != 0) {
                if (window_width >= 960 && navigator.userAgent.indexOf('iPad') == -1) {
                    var video_url = $('.video_bg').attr("data-video");
                    var start_at = $('.video_bg').attr("data-start");
                    $('.video_bg').tubular({
                        videoId: video_url,
                        start: start_at
                    });
                }
                //Use image background for mobiles and tablets
                if (window_width < 960) {
                    var background_url = $('.video_bg').attr("data-alt");
                    $('.video_bg').backstretch(background_url);
                }
            }

            /*  HOME VARIANTS
            ================================================*/
            $('.image_bg').each(function() {
                if ($(this).length != 0) {
                    var background_url = $(this).attr("data-background-url");
                    $(this).backstretch(background_url);
                }
            });

            /*  LIGHTBOXES
            ================================================*/
            $('.elastic-lightbox').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
            $('.video-link').magnificPopup({
                type: 'iframe'
            });

            /*  LOAD SERVICES
            ================================================*/
            $('.load-service').magnificPopup({
                type: 'ajax',
                callbacks: {
                    parseAjax: function(response) {
                        var $content = $(response.data);
                        var videoContainer = $content.find('.service-iframe');
                        videoContainer.fitVids();
                        response.data = $content;
                    }
                }
            });

            /*  LOAD TEAM MEMBERS
            ================================================*/
            $('.load-member').magnificPopup({
                type: 'ajax',
                callbacks: {
                    parseAjax: function(response) {
                        var $content = $(response.data);
                        var videoContainer = $content.find('.member-iframe');
                        videoContainer.fitVids();
                        response.data = $content;
                    }
                }
            });


            /*  SHOW / HIDE CONTACT ELEMENTS
            ================================================*/

            /*-- Show Phone number --*/
            $('a[data-role="show-phone-number"]').click(function(e) {
                e.preventDefault();
                $('.show-elements a[data-role!="show-phone-number"]').removeClass('active');
                if ($('div.contact-hidden-elements div.open-item[id!=hidden-phone-number]').length != 0) {
                    $('div.open-item[id!=hidden-phone-number]').slideUp(400, function() {
                        $('div.open-item').removeClass('open-item');
                        $('#hidden-phone-number').slideToggle(400, function() {
                            $('#hidden-phone-number').toggleClass('open-item');
                            $('a[data-role="show-phone-number"]').toggleClass('active');
                            $('html,body').stop().animate({
                                scrollTop: $('#hidden-phone-number').offset().top
                            }, 'slow');
                        });
                    });
                } else {
                    $('#hidden-phone-number').slideToggle(400, function() {
                        $('#hidden-phone-number').toggleClass('open-item');
                        $('a[data-role="show-phone-number"]').toggleClass('active');
                        $('html,body').stop().animate({
                            scrollTop: $('#hidden-phone-number').offset().top
                        }, 'slow');
                    });
                }

            });

            /*-- Show Form --*/
            $('a[data-role="show-form"]').click(function(e) {
                e.preventDefault();
                $('.show-elements a[data-role!="show-form"]').removeClass('active');
                if ($('div.contact-hidden-elements div.open-item[id!=hidden-form]').length != 0) {
                    $('div.open-item[id!=hidden-form]').slideUp(400, function() {
                        $('div.open-item').removeClass('open-item');
                        $('#hidden-form').slideToggle(400, function() {
                            $('#hidden-form').toggleClass('open-item');
                            $('a[data-role="show-form"]').toggleClass('active');
                            $('html,body').stop().animate({
                                scrollTop: $('#hidden-form').offset().top
                            }, 'slow');
                        });
                    });
                } else {
                    $('#hidden-form').slideToggle(400, function() {
                        $('#hidden-form').toggleClass('open-item');
                        $('a[data-role="show-form"]').toggleClass('active');
                        $('html,body').stop().animate({
                            scrollTop: $('#hidden-form').offset().top
                        }, 'slow');
                    });
                }

            });

            /*-- Show Map --*/
            $('a[data-role="show-map"]').click(function(e) {
                e.preventDefault();
                $('.show-elements a[data-role!="show-map"]').removeClass('active');
                if ($('div.contact-hidden-elements div.open-item[id!=hidden-map]').length != 0) {
                    $('div.open-item[id!=hidden-map]').slideUp(400, function() {
                        $('div.open-item').removeClass('open-item');
                        $('#hidden-map').slideToggle(400, function() {
                            $('#hidden-map').toggleClass('open-item');
                            $('a[data-role="show-map"]').toggleClass('active');
                            $('.iframe-container').fitVids();
                            $('html,body').stop().animate({
                                scrollTop: $('#hidden-map').offset().top
                            }, 'slow');
                        });
                    });
                } else {
                    $('#hidden-map').slideToggle(400, function() {
                        $('#hidden-map').toggleClass('open-item');
                        $('a[data-role="show-map"]').toggleClass('active');
                        $('.iframe-container').fitVids();
                        $('html,body').stop().animate({
                            scrollTop: $('#hidden-map').offset().top
                        }, 'slow');
                    });
                }

            });

            /*-- Show Social Icons --*/
            $('a[data-role="show-social-icons"]').click(function(e) {
                e.preventDefault();
                $('.show-elements a[data-role!="show-social-icons"]').removeClass('active');
                if ($('div.contact-hidden-elements div.open-item[id!=hidden-social]').length != 0) {
                    $('div.open-item[id!=hidden-social]').slideUp(400, function() {
                        $('div.open-item').removeClass('open-item');
                        $('#hidden-social').slideToggle(400, function() {
                            $('#hidden-social').toggleClass('open-item');
                            $('a[data-role="show-social-icons"]').toggleClass('active');
                            $('html,body').stop().animate({
                                scrollTop: $('#hidden-social').offset().top
                            }, 'slow');
                        });
                    });
                } else {
                    $('#hidden-social').slideToggle(400, function() {
                        $('#hidden-social').toggleClass('open-item');
                        $('a[data-role="show-social-icons"]').toggleClass('active');
                        $('html,body').stop().animate({
                            scrollTop: $('#hidden-social').offset().top
                        }, 'slow');
                    });
                }

            });


            /*  CONTACT FORM VALIDATION
            ================================================*/
            $('#elastic-contact-form button#elastic-send').click(function(e) {

                //Stop propagating the parent event handler
                e.stopPropagation();

                //Set the variables
                var name_value = $('input#elastic-name').val();
                var mail_value = $('input#elastic-email').val();
                var subject_value = $('input#elastic-subject').val();
                var message_value = $('textarea#elastic-message').val();

                var missing_name = $('input#elastic-name').attr('data-missing-message');
                var missing_mail = $('input#elastic-email').attr('data-missing-message');
                var invalid_mail = $('input#elastic-email').attr('data-invalid-message');
                var missing_subject = $('input#elastic-subject').attr('data-missing-message');
                var missing_message = $('textarea#elastic-message').attr('data-missing-message');

                var original_border = $('input#elastic-name').css('border');
                var original_color = $('input#elastic-name').css('color');
                var error_border = '1px solid #990000';
                var error_color = '#990000';

                //Check if name field empty
                if (name_value == "" || name_value == missing_name) {
                    $('input#elastic-name').css({
                        'color': error_color,
                        'border': error_border
                    });
                    $('input#elastic-name').val(missing_name);
                }

                //Check if name field has error message
                $('input#elastic-name').click(function() {
                    var actual_name_value = $('input#elastic-name').val();
                    if (actual_name_value == missing_name) {
                        $(this).val('');
                        $(this).css({
                            'color': original_color,
                            'border': original_border
                        });
                    }
                });

                //Check if email field empty or the mail is invalid
                if (mail_value == "" || mail_value == missing_mail || mail_value == invalid_mail) {
                    $('input#elastic-email').css({
                        'color': error_color,
                        'border': error_border
                    });
                    $('input#elastic-email').val(missing_mail);
                }

                //Validate email address
                if (mail_value != missing_mail && mail_value != '') {
                    var atpos = mail_value.indexOf("@");
                    var dotpos = mail_value.lastIndexOf(".");
                    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= mail_value.length) {
                        $('input#elastic-email').css({
                            'color': error_color,
                            'border': error_border
                        });
                        $('input#elastic-email').val(invalid_mail);
                        return false;
                    }
                }

                //Check if email field has error message
                $('input#elastic-email').click(function() {
                    var actual_email_value = $('input#elastic-email').val();
                    if (actual_email_value == missing_mail || actual_email_value == invalid_mail) {
                        $(this).val('');
                        $(this).css({
                            'color': original_color,
                            'border': original_border
                        });
                    }
                });

                //Check if subject field empty
                if (subject_value == "" || subject_value == missing_subject) {
                    $('input#elastic-subject').css({
                        'color': error_color,
                        'border': error_border
                    });
                    $('input#elastic-subject').val(missing_subject);
                }

                //Check if subject field has error message
                $('input#elastic-subject').click(function() {
                    var actual_subject_value = $('input#elastic-subject').val();
                    if (actual_subject_value == missing_subject) {
                        $(this).val('');
                        $(this).css({
                            'color': original_color,
                            'border': original_border
                        });
                    }
                });

                //Check if message textarea empty
                if (message_value == "" || message_value == missing_message) {
                    $('textarea#elastic-message').css({
                        'color': error_color,
                        'border': error_border
                    });
                    $('textarea#elastic-message').val(missing_message);
                }

                //Check if message textarea has error message
                $('textarea#elastic-message').click(function() {
                    var actual_message_value = $('textarea#elastic-message').val();
                    if (actual_message_value == missing_message) {
                        $(this).val('');
                        $(this).css({
                            'color': original_color,
                            'border': original_border
                        });
                    }
                });

                //Check if all the fields all completed properly
                if (name_value == "" || name_value == missing_name || mail_value == "" || mail_value == invalid_mail || mail_value == missing_mail || message_value == "" || message_value == missing_message || subject_value == "" || subject_value == missing_subject) {
                    return false;
                }

                //Send the values to the mail.php via ajax
                $.ajax({
                    type: 'post',
                    url: 'mail.php',
                    data: 'name=' + name_value + '&email=' + mail_value + '&subject=' + subject_value + '&comments=' + message_value,

                    success: function(results) {

                        $.magnificPopup.open({
                            items: {
                                src: '<div class="contact-info"><p>' + results + ' </p></div>',
                                type: 'inline'
                            }
                        });

                        $('input#elastic-name').val('');
                        $('input#elastic-email').val('');
                        $('input#elastic-subject').val('');
                        $('textarea#elastic-message').val('');
                    }
                });


            }); //send click process ends here


            /*  MISC
            ================================================*/

            /*-- Init Animation Handler --*/
            new ENTRANCE().init();

            /*-- Tool Tips --*/
            $('.member-social ul li a, #hidden-social a').tipTip({
                delay: 100
            });


        }); //END: document.ready


        /* window.load
        ==================*/
        $(window).load(function() {

            /*  PRELOADER
            ================================================*/
            var preloader = '#elastic-preloader';
            if ($(preloader).length != 0) {
                $('#elastic-preloader h1').text('100');
                setTimeout(function() {
                    $(preloader).fadeOut(700, function() {
                        $('#elastic-preloader h1').text('0');
                    });
                }, 1500);
            }

            /*  PORTFOLIO
            ================================================*/

            /*-- Masonry Layouts --*/
            $('.masonry-container').masonry({
                columnWidth: 1
            });

            /*-- Load Items via Ajax --*/
            $('a.ajax-load, .project-contents a.more-link').click(function(e) {
                e.preventDefault();
                var source = $(this).attr("href");
                $('body').css("overflow", "hidden");
                $('body').append('<div id="portfolio-overlay"><div id="item-preloader"><div id="preloader_1"><span></span><span></span><span></span><span></span><span></span></div></div></div>');
                setTimeout(function() {
                    $('#portfolio-overlay').load(source, function() {

                        //Call the slider if the elment exist
                        if ($('#portfolio-slider').length != 0) {
                            $('#portfolio-slider').flexslider({
                                controlNav: false,
                                prevText: "&lt;",
                                nextText: "&gt;",
                                smoothHeight: true,
                                start: function() {
                                    var slider_height = $('#portfolio-slider ul li:first-child img').height();
                                    $('#portfolio-slider').css('height', slider_height);
                                }
                            });
                        }

                        //Call fitVids for iframes
                        if ($('.portfolio-iframe').length != 0) {
                            $('.portfolio-iframe').fitVids();
                        }


                        //Fade out the loader
                        $('#item-preloader').fadeOut(400, function() {
                            $('#item-preloader').remove();
                        });

                        //Fade in the item
                        $('#portfolio-item').fadeIn(1000);

                        //Close the item
                        $('a#close-item').click(function(e) {
                            e.preventDefault();
                            $('#portfolio-overlay').empty();
                            $('#portfolio-overlay').fadeOut(2, function() {
                                $('#portfolio-overlay').remove();
                                $('body').removeAttr('style');
                            });
                        });
                    });
                }, 2000);
            });

        }); //END: window.load


        /* window scroll
        ==================*/
        $(window).scroll(function() {

            var top_distance = $(this).scrollTop();

            /*  FLOATING MENU
            ================================================*/
            var floating_element = $('a.floating-button');
            if (floating_element.length != 0) {

                if (top_distance > window_height) {
                    floating_element.fadeIn(600);
                }
                if (top_distance < window_height) {
                    floating_element.fadeOut(600);
                }

            }

        }); //END: window.scroll


        /* keyboard events
        ==================*/
        $(document).keyup(function(e) {

            //ESC
            if (e.keyCode == 27) {

                //Close overlay menu
                if ($('#elastic_overlay_menu').length != 0) {
                    $('#elastic_overlay_menu').fadeOut(300);
                }

                //Close slideIn menu
                if ($('#side_menu_panel').length != 0) {
                    $('#side_menu_panel').animate({
                        'right': '-300px'
                    }, 200, 'linear', function() {
                        $('#side_overlay').fadeOut(300);
                    });
                }

                //Close Portfolio item if exists
                if ($('#portfolio-overlay').length != 0) {
                    $('#portfolio-overlay').empty();
                    $('#portfolio-overlay').fadeOut(2, function() {
                        $('#portfolio-overlay').remove();
                        $('body').removeAttr('style');
                    });
                }
            }

        }); // END: keyboard events


    })(jQuery);
</script>