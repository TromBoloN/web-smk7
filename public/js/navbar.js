let nav = document.querySelector('.main-navigation')
let show_nav = document.querySelector('.navbar-button-scroll')
let navbar_additional_content = document.querySelector('[data-nav-additional]')

let search_modal_opener = document.querySelector('[data-search-modal-opener]')

if (navbar_additional_content) {
    dark_backdrop_nav = navbar_additional_content.querySelector('[class^="darkness-backdrop"]')
    close_search_nav = navbar_additional_content.querySelector('[data-close-side]')
    search_modal = navbar_additional_content.querySelector('[data-search-modal]')
}

show_nav.addEventListener('click', function (params) {
        nav.classList.toggle('showed-lock')
})

document.addEventListener('mousemove', function(e){

    if (!nav.dataset.topShowed) {
        if(e.clientY > 0 && e.clientY < 100){
            nav.classList.add('showed')
        }else{
            nav.classList.remove('showed')
        }
    }
})

scroll_check()

search_modal_opener.addEventListener('click', search_modal_open)
dark_backdrop_nav.addEventListener('click', search_modal_close)
close_search_nav.addEventListener('click', search_modal_close)

function search_modal_open(params) {
    search_modal.classList.add('active')
    dark_backdrop_nav.style.display = 'block';
    setTimeout(() => {
        dark_backdrop_nav.classList.add('active')
    }, 0);
}

function search_modal_close(params) {
    search_modal.classList.remove('active')
    dark_backdrop_nav.classList.remove('active')

    setTimeout(() => {
        dark_backdrop_nav.style.display = 'none';
    }, 100);
}

window.addEventListener('scroll', scroll_check)
function scroll_check(params) {
    let scrollVertical = window.scrollY

    if (scrollVertical > 10) {
        nav.classList.add('scrolled')
        nav.classList.remove('showed')
 
        if(innerWidth > 768){
            nav.removeAttribute('data-top-showed')
        }
    }else{
        nav.setAttribute('data-top-showed', true)
        // nav.classList.remove('showed-lock')

        if(innerWidth > 768){
            nav.classList.add('showed')        
        }else{
            nav.classList.add('showed-lock')        
        }
        nav.classList.remove('scrolled')
    }
} 