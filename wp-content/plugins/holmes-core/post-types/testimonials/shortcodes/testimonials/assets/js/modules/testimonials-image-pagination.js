(function ($) {
    'use strict';

    var testimonialsImagePagination = {};
    mkdf.modules.testimonialsImagePagination = testimonialsImagePagination;

    testimonialsImagePagination.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfTestimonialsImagePagination();
    }

    /**
     * Init Owl Carousel
     */
    function mkdfTestimonialsImagePagination() {
        var sliders = $('.mkdf-testimonials-image-pagination-inner');

        if (sliders.length) {
            sliders.each(function () {
                    var slider = $(this),
                        slideItemsNumber = slider.children().length,
                        loop = true,
                        autoplay = false,
                        sliderSpeed = 3500,
                        sliderSpeedAnimation = 500,
                        margin = 0,
                        stagePadding = 0,
                        center = false,
                        autoWidth = false,
                        animateInClass = false, // keyframe css animation
                        animateOutClass = false, // keyframe css animation
                        navigation = true,
                        pagination = true,
                        drag = true,
                        sliderDataHolder = slider;

                    if (typeof sliderDataHolder.data('enable-autoplay') !== 'undefined' && sliderDataHolder.data('enable-autoplay') !== 'no') {
                        autoplay = true;
                    }

                    if (typeof sliderDataHolder.data('enable-loop') !== 'undefined' && sliderDataHolder.data('enble-loop') !== false) {
                        loop = sliderDataHolder.data('enable-loop');
                    }

                    if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
                        sliderSpeed = sliderDataHolder.data('slider-speed');
                    }
                    if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
                        sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
                    }

                    if (navigation && pagination) {
                        slider.addClass('mkdf-slider-has-both-nav');
                    }

                    if (pagination) {
                        var dotsContainer = '#mkdf-testimonial-pagination';
                        $('.mkdf-tsp-item').on('click', function () {
                            slider.trigger('to.owl.carousel', [$(this).index(), 300]);
                        });
                    }

                    if (slideItemsNumber <= 1) {
                        loop = false;
                        autoplay = false;
                        navigation = false;
                        pagination = false;
                    }

                    slider.parent().parent().find('.mkdf-testimonal-nav-prev').on('click', function (e) {
                        slider.trigger('prev.owl.carousel');
                    });

                    slider.parent().parent().find('.mkdf-testimonal-nav-next').on('click', function (e) {
                        slider.trigger('next.owl.carousel');
                    });

                    if (autoplay) {
                        // on holder hover in stop
                        slider.parent().parent().on('mouseenter', function (e) {
                            slider.trigger('stop.owl.autoplay');
                        });

                        // on holder hover out play slider
                        slider.parent().parent().on('mouseleave', function (e) {
                            slider.trigger('play.owl.autoplay');
                        });
                    }

                    slider.waitForImages(function () {
                        $(this).owlCarousel({
                            items: 1,
                            loop: loop,
                            autoplay: autoplay,
                            autoplayHoverPause: true,
                            autoplayTimeout: sliderSpeed,
                            smartSpeed: sliderSpeedAnimation,
                            margin: margin,
                            stagePadding: stagePadding,
                            center: center,
                            autoWidth: autoWidth,
                            animateIn: animateInClass,
                            animateOut: animateOutClass,
                            dots: pagination,
                            dotsContainer: dotsContainer,
                            nav: navigation,
                            drag: drag,
                            callbacks: true,
                            onInitialize: function () {
                                slider.css('visibility', 'visible');
                            },
                            onDrag: function (e) {
                                if (mkdf.body.hasClass('mkdf-smooth-page-transitions-fadeout')) {
                                    var sliderIsMoving = e.isTrigger > 0;

                                    if (sliderIsMoving) {
                                        slider.addClass('mkdf-slider-is-moving');
                                    }
                                }
                            },
                            onDragged: function () {
                                if (mkdf.body.hasClass('mkdf-smooth-page-transitions-fadeout') && slider.hasClass('mkdf-slider-is-moving')) {

                                    setTimeout(function () {
                                        slider.removeClass('mkdf-slider-is-moving');
                                    }, 500);
                                }
                            }
                        });
                    });
                }
            );
        }
    }

})
(jQuery);