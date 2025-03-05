let nav = document.querySelector('.main-navigation')
let show_nav = document.querySelector('.navbar-button-scroll')

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

window.addEventListener('scroll', scroll_check)

function scroll_check(params) {
    let scrollVertical = window.scrollY

    if (scrollVertical > 10) {
        nav.classList.remove('showed')
        nav.classList.add('scrolled')
        nav.removeAttribute('data-top-showed')
    }else{
        nav.setAttribute('data-top-showed', true)
        // nav.classList.remove('showed-lock')
        nav.classList.add('showed')
        nav.classList.remove('scrolled')
    }
}