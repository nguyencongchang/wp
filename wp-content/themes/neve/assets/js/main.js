jQuery(document).ready(function($) {
    let counterYear = $('.hc-counter');
    let number = counterYear.attr('data-counter');

    counterYear.animationCounter({
        start: 1,
        end: number,
        step: 1,
        delay: 100
    });

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
});
