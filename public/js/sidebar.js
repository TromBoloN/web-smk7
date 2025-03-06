let db_side = document.querySelector('.dashboard-side')
let side_open = document.querySelector('.sidebar-button')
let side_close = document.querySelector('[data-close-side]')
let dark_backdrop = document.querySelector('.darkness-backdrop')

let dropdown_button = document.querySelectorAll('[data-dropdown-nav-button]')
let dropdown_items = document.querySelector('[data-dropdown-nav-items]')

side_close.addEventListener('click', function () {
    db_side.classList.remove('open')
    dark_backdrop.classList.remove('active')
})

side_open.addEventListener('click', function(){
    db_side.classList.add('open')
    dark_backdrop.classList.add('active')
})

dropdown_button.forEach( el => {
    el.addEventListener('click', function (e) {
        el.parentElement.classList.toggle('active');
        
        let sibling = el.nextElementSibling
        let h = sibling.scrollHeight

        if (!el.parentElement.classList.contains('active')) {    
            sibling.style.maxHeight = '0px'
        }else{
            sibling.style.maxHeight = h +'px'
        }
        
    })
})