// COUNTER ACHIEVEMENTS FUNCTION
document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll(".home-count");
    let started = false;
    const duration = 2000; 
    const steps = 100; 

    function animateCounters() {
        counters.forEach(counter => {
            

            const target = parseInt(counter.innerText.replace(/,/g, ""));
            counter.innerText = 0;

            const increment = target / steps;
            let currentStep = 0;

            const updateCounter = () => {
                currentStep++;
                const current = Math.min(Math.ceil(currentStep * increment), target);
                
                if(counter.dataset.noComma){
                    counter.innerText = current; 
                }else{
                    counter.innerText = current.toLocaleString();
                }

                if (current < target) {
                    setTimeout(updateCounter, duration / steps);
                } else {

                    if(counter.dataset.noComma){
                        counter.innerText = target; 
                    }else{
                        counter.innerText = target.toLocaleString(); 
                    }
                }
            };

            updateCounter();
        });
    }

    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function checkScroll() {
        if (!started && isInViewport(document.querySelector(".achievements"))) {
            started = true;
            animateCounters();
        }
    }

    window.addEventListener("scroll", checkScroll);
});

