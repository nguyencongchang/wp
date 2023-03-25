jQuery(document).ready(function($) {
    const fieldNumberCounterArray = [
        '.static-counter-1',
        '.static-counter-2',
        '.static-counter-3',
        '.hc-counter'
    ];

    fieldNumberCounterArray.map((item) => {
        $(item).animationCounter({
            start: 1,
            end: $(item).attr('data-counter'),
            step: 1,
            delay: 100
        });
    });

    $('.static-counter-4').animationCounter({
        start: 1,
        end: $('.static-counter-4').attr('data-counter'),
        step: 1,
        delay: 20
    });
    $('.static-counter-4').next().text('%');


    function reveal() {
        let reveals = document.querySelectorAll(".reveal");

        for (let i = 0; i < reveals.length; i++) {
            let windowHeight = window.innerHeight;
            let elementTop = reveals[i].getBoundingClientRect().top;
            let elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);

    $('.slick-slide-product').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        prevArrow: '<div class="slick-prev"><i class="slick-arrow" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="slick-arrow" aria-hidden="true"></i></div>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.mile-cas').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.partner-cas').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    })

    const blockForm = $('#block-form');

    $('.icon-search-header').on('click', function() {
        blockForm.removeClass('d-none');
        blockForm.addClass('block-search');

    })

    $(document).on('click', function(event) {
            if (!blockForm.is(event.target) && blockForm.has(event.target).length === 0 && !$('.icon-search-header').is(event.target) && $('.icon-search-header').has(event.target).length === 0) {
                blockForm.removeClass('block-search');
                blockForm.addClass('d-none');
            }
    });

    $('.gt-selected').on('click', function() {
        blockForm.removeClass('block-search');
        blockForm.addClass('d-none');
    })

    $('.article-cas').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        prevArrow: '<div class="slick-prev"><i class="slick-arrow" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="slick-arrow" aria-hidden="true"></i></div>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.back-to-top').css('display', 'block');

    const buttonMenuMobile = $('.menu-mobile-toggle .navbar-toggle')

    $('.icon-menu-bar-tablet').on('click', function () {
        buttonMenuMobile.trigger('click')
    })


    const infoMobile = $('.info-mobile');

    $('.header-menu-sidebar-bg').append(infoMobile);
    infoMobile.before($('.header-menu-sidebar-bg .close-sidebar-panel'));
    infoMobile.after($('.header-menu-sidebar-bg .header-menu-sidebar-inner'));

});
