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