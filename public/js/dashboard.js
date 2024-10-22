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
                counter.innerText = current.toLocaleString();

                if (current < target) {
                    setTimeout(updateCounter, duration / steps);
                } else {
                    counter.innerText = target.toLocaleString(); 
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


function openModal(modalId, imageSrc = null, captionText = null) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'block';

    if (imageSrc && captionText) {
        document.getElementById("modal-image").src = imageSrc;
        document.getElementById("modal-caption").textContent = captionText;
    }

    document.body.classList.add('with-modal-open'); // Prevent background scrolling
}

document.querySelectorAll('.nav a').forEach(link => {
    link.addEventListener('click', function (event) {
        // Remove active class from all nav items and tab panes
        document.querySelectorAll('.nav li, .tab-pane').forEach(el => el.classList.remove('active'));

        // Add active class to the clicked nav item and its associated tab pane
        link.parentElement.classList.add('active');
        const targetPane = document.querySelector(link.getAttribute('href'));
        targetPane.classList.add('active');
    });
});


// Function to open the modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    document.body.classList.add('with-modal-open'); 
    modal.style.display = 'block';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    document.body.classList.remove('with-modal-open');
    modal.style.display = 'none';
}
