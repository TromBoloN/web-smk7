let tabz_open = document.querySelectorAll('[data-tabz-dropdown-open]')
let tabz_dropdown = document.querySelector('[data-tabz-dropdown-menu]')

document.addEventListener('click', close_tabz_dropdown)

tabz_open.forEach(el => {
    el.addEventListener('click', function () {
        tabz_dropdown.style.display = 'flex'
        tabz_dropdown.style.left = ( el.getBoundingClientRect().right - tabz_dropdown.getBoundingClientRect().width ) +'px'
        tabz_dropdown.style.top = el.getBoundingClientRect().bottom +'px'

        if(tabz_dropdown.querySelector('[data-tabz-edit]')){
            let original_url = tabz_dropdown.querySelector('[data-tabz-edit]').getAttribute('href')
            let modify_url = original_url.split('/')
                        
            modify_url[modify_url.length - 2] = el.dataset.tabzDropdownOpen
            
            tabz_dropdown.querySelector('[data-tabz-edit]').href = modify_url.join('/')
        }

        if(tabz_dropdown.querySelector('[data-tabz-del]')){
            let original_url = tabz_dropdown.querySelector('[data-tabz-del]').getAttribute('action')
            let modify_url = original_url.split('/')
                        
            modify_url[modify_url.length - 1] = el.dataset.tabzDropdownOpen
            
            tabz_dropdown.querySelector('[data-tabz-del]').action = modify_url.join('/')
        }
    })
});


function close_tabz_dropdown(e) {
    let tabz_unfocus_check = false
    
    tabz_open.forEach(element => {
        if (e.target == element) {
            tabz_unfocus_check = true
        }
    });

    if (
        e.target !== tabz_dropdown &&
        !tabz_unfocus_check
    ) {
            tabz_dropdown.style.display = 'none'
    }
}