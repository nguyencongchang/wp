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
});
