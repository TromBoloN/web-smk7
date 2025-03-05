let tabz_open = document.querySelectorAll('[data-tabz-dropdown-open]')
let tabz_dropdown = null;

document.addEventListener('click', close_tabz_dropdown)
document.addEventListener('resize', tabz_open)

tabz_open.forEach(el => {
    el.addEventListener('click',  open_tabz_dropdown)
});

function open_tabz_dropdown(current) {

    
        let id_target = current.target.dataset.tabzTarget
        tabz_dropdown = document.getElementById(id_target)

        tabz_dropdown.style.display = 'flex'

        // RESPONSIBLE FOR COUNTS THE POSITION OF THE TABZ
        tabz_dropdown.style.left = ( current.target.getBoundingClientRect().right - tabz_dropdown.getBoundingClientRect().width ) +'px'
        tabz_dropdown.style.top = current.target.getBoundingClientRect().bottom +'px'

       let actions = tabz_dropdown.querySelectorAll('[data-tabz-action]')

       actions.forEach(element => {
            let action_href = element.getAttribute('href') ?? element.getAttribute('action')
            let url_arr = action_href.split('/')
            let int_pos = null

            url_arr.forEach(element => {
                if (!isNaN(element) && typeof Number(element) === "number") {
                    int_pos = url_arr.indexOf(element)
                }                
            });

            console.log(url_arr);
            

            url_arr[int_pos] = current.target.dataset.tabzDropdownOpen
            element.hasAttribute('href') ? element.setAttribute('href', url_arr.join('/')) : element.setAttribute('action', url_arr.join('/'))
            
       });
}


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