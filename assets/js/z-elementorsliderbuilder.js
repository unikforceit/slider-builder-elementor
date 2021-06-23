(function ($) {
"use strict";

    var SliderBuilder = function ($scope, $) {

        $scope.find('.slider-builder-sections').each(function () {

            var Slider_Data = $(this).data('esb');
            //console.log(Slider_Data);
            $('.slider-carousel').owlCarousel({
                margin: Slider_Data['gap'],
                responsiveClass:true,
                nav: Slider_Data['navs'],
                center: Slider_Data['centered'],
                dots: Slider_Data['dots'],
                autoplay: Slider_Data['autoplay'],
                smartSpeed: Slider_Data['speed'],
                autoplayHoverPause: Slider_Data['autoplaypause'],
                navText:["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
                loop:Slider_Data['loop'],
                responsive:{
                    320:{
                        items:Slider_Data['m_item'],
                    },
                    576:{
                        items:Slider_Data['t_item'],
                    },
                    1025:{
                        items:Slider_Data['d_item'],
                    },
                },
            });
            // Js End
        });

    };


    $(window).on('elementor/frontend/init', function () {

        if (elementorFrontend.isEditMode()) {

            elementorFrontend.hooks.addAction('frontend/element_ready/slider-builder.default', SliderBuilder);

        }
        else {

            elementorFrontend.hooks.addAction('frontend/element_ready/slider-builder.default', SliderBuilder);

        }
    });

console.log('Main Js loaded')
})(jQuery);
