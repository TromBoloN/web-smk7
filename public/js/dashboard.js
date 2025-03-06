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

// MODAL FUNCION
let image_target = document.querySelectorAll("[data-image-modal]");
let backdrop = document.querySelector("[data-dark-backdrop]");
let gallery_modal = document.querySelector("[data-gallery-modal]");
let close_modal = gallery_modal.querySelector("[data-close-side]");

image_target.forEach((element) => {
    element.addEventListener("click", openModal);
});

close_modal.addEventListener("click", closeModal)
backdrop.addEventListener("click", closeModal)

function openModal(e) {
    
    let target = e.target.closest('[data-image-modal]')
    let caption = target.getAttribute('data-image-modal');
    let image_modal = gallery_modal.querySelector('.image-modal');
    let img = target.querySelector('img')
    let src = img.getAttribute('src');

    backdrop.classList.add('active');
        gallery_modal.style.display = 'flex';

    setTimeout(() => {
        gallery_modal.classList.add('active');
    }, 0);

    if (src && caption) {
        image_modal.src = src;
        gallery_modal.querySelector("[data-modal-caption]").textContent = caption;
    }

}

function closeModal() {
    backdrop.classList.remove('active');

    gallery_modal.classList.remove('active');

    setTimeout(() => {
        gallery_modal.style.display = 'none';
    }, 100);


}
