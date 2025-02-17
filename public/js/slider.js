let holder = document.querySelector('[data-slider-holder]')
let data_slider_controller = holder.querySelectorAll('[data-slider_controller]')
let current_slider_item = document.querySelectorAll('[data-tab="1"]')
let counter_pos = current_slider_item[0].dataset.tab

data_slider_controller.forEach( el => {el.addEventListener('click', slidor)})

function slidor(events){

    let slider_direction = events.target.closest('[data-slider_controller]').dataset.slider_controller;

    if (
        current_slider_item[1].dataset.sliderItem == 'last' && slider_direction == 'right' ||
        current_slider_item[1].dataset.sliderItem == 'first' && slider_direction == 'left'
    ) {return}

        current_slider_item.forEach( el => {el.classList.remove('active')})
        
        let previous_width =   current_slider_item[1].offsetWidth

        if ( slider_direction == 'right') {
            counter_pos--        
        }else{
            counter_pos++
        }
        current_slider_item = document.querySelectorAll(`[data-tab="${counter_pos}"]`)

        current_slider_item.forEach( el => {el.classList.add('active')})

        holder.querySelector('[data-slider-track]').style.transform =  `translateX(` +(( previous_width + 40) *  Number(current_slider_item[1].dataset.tab)) + 'px' + ')'
    }    

// CLICK ONLY
let impression_nav = document.querySelector('.impression-nav-container')
let tab_content = document.querySelector('.tab-content')

impression_nav.querySelectorAll('[data-tab]').forEach(link => {
    
    link.addEventListener('click', function () {

        let previous_width =   current_slider_item[1].offsetWidth
        current_slider_item = document.querySelectorAll(`[data-tab="${link.dataset.tab}"]`)
        counter_pos = current_slider_item[1].dataset.tab

        tab_content.querySelectorAll('[data-tab]').forEach(el => el.classList.remove('active'));

        impression_nav.querySelectorAll('[data-tab]').forEach(link => {link.classList.remove('active');})
        link.classList.add('active');

        holder.querySelector('[data-slider-track]').style.transform =  `translateX(` +(( previous_width + 40) *  Number(current_slider_item[1].dataset.tab)) + 'px' + ')'

        tab_content.querySelector(`[data-tab="${link.dataset.tab}"]`).classList.add('active')


    });
});
// CLICK ONLY