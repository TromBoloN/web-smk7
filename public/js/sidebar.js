let db_side = document.querySelector('.dashboard-side')
let side_open = document.querySelector('.sidebar-button')
let side_close = document.querySelector('[data-close-side]')
let dark_backdrop = document.querySelector('[data-dark-backdrop]')
let last_height = null

let dropdown_button = document.querySelectorAll('[data-dropdown-nav-button]')
let dropdown_items = document.querySelector('[data-dropdown-nav-items]')

window.addEventListener('resize', function (params) {
    
        if (innerWidth>1080) {
            db_side.classList.remove('open')
            dark_backdrop.classList.remove('active')
        }
})

side_close.addEventListener('click', close)
dark_backdrop.addEventListener('click', close)
function close(){
    db_side.classList.remove('open')
    dark_backdrop.classList.remove('active')
}

side_open.addEventListener('click', function(){
    db_side.classList.add('open')
    dark_backdrop.classList.add('active')
})

dropdown_button.forEach( el => {
    el.addEventListener('click', function (e) {
        let elem = el.closest('.dropdown-container')
        elem.classList.toggle('active')

        let sibling = el.nextElementSibling
        let h = sibling.scrollHeight

        if (!elem.classList.contains('active')) {    

            if(el.dataset.rootedLink){
            
                let linked = document.getElementById(`${el.dataset.rootedLink}`)
                linked.style.maxHeight = (parseInt(linked.style.maxHeight, 10)-h) +'px';
                
            }

            sibling.style.maxHeight = '0px'

            if(elem.querySelector('[data-rooted-container]')){
                let children = elem.querySelectorAll('[data-rooted-container]')
    
                children.forEach(element => {
                    element.classList.remove('active')
                    element.querySelector('.dropdown-content').style.maxHeight = '0px'
                });
            }
        }else{
            sibling.style.maxHeight = h +'px'
        }
       

        if(el.dataset.dropdownNavButton == 'rooted' && elem.classList.contains('active')){
            let linked = document.getElementById(`${el.dataset.rootedLink}`)
            linked.style.maxHeight = parseInt(linked.style.maxHeight, 10) + h +'px';
        }
        
    })
})