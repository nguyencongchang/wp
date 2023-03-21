jQuery(document).ready(function($) {
    let counterYear = $('.hc-counter');
    let number = counterYear.attr('data-counter');

    counterYear.animationCounter({
        start: 1,
        end: number,
        step: 1,
        delay: 100
    });
});
