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


    const buttonMenuMobile = $('.menu-mobile-toggle .navbar-toggle')

    $('.icon-menu-bar-tablet').on('click', function () {
        buttonMenuMobile.trigger('click')
    })


    const infoMobile = $('.info-mobile');

    $('.header-menu-sidebar-inner').append(infoMobile);
    infoMobile.after($('.header-menu-sidebar-inner .builder-item'));

    $(window).scroll(function() {
        let stickyHeaderOffer = $('#header-grid');

        if ($(window).scrollTop() >= stickyHeaderOffer.offset().top) {
            stickyHeaderOffer.addClass('sticky-active');
        }

        if ($(window).scrollTop() < 134 && stickyHeaderOffer.hasClass('sticky-active')) {
            stickyHeaderOffer.removeClass('sticky-active');
        }
    });

    const btnBackToTop = $('.back-to-top');

    $(window).scroll(function() {
        const scrollTop = $(this).scrollTop();
        let elementOffset = "";
        if (!$('.single-page-container').length) {
             elementOffset = $('.single-post-container').offset().top;
        } else {
             elementOffset = $('.single-page-container').offset().top;
        }

        if (scrollTop > elementOffset) {
            btnBackToTop.addClass('d-block');
            btnBackToTop.removeClass('d-none');
        } else {
            btnBackToTop.addClass('d-none');
            btnBackToTop.removeClass('d-block');
        }
    });



    btnBackToTop.click(function() {
        $('html, body').animate({scrollTop: 0}, 'slow');
        btnBackToTop.addClass('d-none');
        return false;
    });

    const language      = $('.language .label');
    const languageBlock = $('.language ul');
    const languageVi    = $('.language-vi');
    const languageEn    = $('.language-en');

    language.on('click', function () {
        languageBlock.removeClass('d-none');
    });

    $(document).on('click', function(event) {
        if (!languageBlock.is(event.target) && languageBlock.has(event.target).length === 0 && !language.is(event.target) && language.has(event.target).length === 0 ){
            languageBlock.addClass('d-none');
        }
    });

    const languageCurrent = $('.gt_options .gt-current');
    const gtOption        = $('.gt_options .nturl');
    const vi              = gtOption.attr('data-gt-lang') === "vi";
    const en              = gtOption.attr('data-gt-lang') === "en";

    const languageSelectedVi = $('.language-selected-vi');
    const languageSelectedEn = $('.language-selected-en');

    // document.querySelector('a[data-gt-lang="vi"]').click();



    languageVi.on('click', function () {
        // new google.translate.TranslateElement({pageLanguage: 'vi', includedLanguages: 'ar', autoDisplay: true}, 'google_translate_element');
        document.querySelector('a[data-gt-lang="vi"]').click();
        $(this).parent().addClass('d-none');
        languageSelectedEn.addClass('d-none');
        languageSelectedVi.removeClass('d-none');
        languageSelectedVi.addClass('d-block');
        languageSelectedEn.removeClass('d-block');
        $('.text-language').text('Vi');
    })

    languageEn.on('click', function (event) {
        // new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar', autoDisplay: true}, 'google_translate_element');
        document.querySelector('a[data-gt-lang="en"]').click();
        $(this).parent().addClass('d-none');
        languageSelectedVi.addClass('d-none');
        languageSelectedEn.removeClass('d-none');
        languageSelectedEn.addClass('d-block');
        languageSelectedVi.removeClass('d-block');
        event.preventDefault();
        $('.text-language').text('En');
    })

    document.querySelector('a[data-gt-lang="en"]').text('EN');
    document.querySelector('a[data-gt-lang="en"]').text('VN');



    $('.header-language').on('click', function (event) {
        console.log('chang')
    })

    // $('.header-language').on('click', function (event) {
    //     console.log('css')
    //     if ($('.gt-current-lang .gt-lang-code').text() === 'vi') {
    //         console.log('chang');
    //     }
    // })

    if (!languageSelectedVi.hasClass('d-none')) {
        $('.text-language').text('Vi');
    } else {
        $('.text-language').text('En');
    }

    $('.pro-img').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
    });

    $('.pro-thumb').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        prevArrow: '<i class="fa fa-angle-left smooth prev slick-arrow" aria-hidden="true"></i>',
        nextArrow: '<i class="fa fa-angle-right smooth next slick-arrow" aria-hidden="true"></i>',
    });

    const prevSlideThumb = $('.pro-thumb').find('.prev');
    const nextSlideThumb = $('.pro-thumb').find('.next');

    prevSlideThumb.on('click', function () {
        $('.pro-img').find('.slick-prev').trigger('click');
    })

    nextSlideThumb.on('click', function () {
        $('.pro-img').find('.slick-next').trigger('click');
    })

    $('[data-fancybox]').fancybox({
        buttons : [
            'close'
        ],
        wheel : false,
        transitionEffect: "slide",
        loop            : true,
        toolbar         : false,
        clickContent    : false
    });
});
