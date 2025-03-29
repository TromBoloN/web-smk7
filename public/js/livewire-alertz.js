let alertz_container = document.querySelector('[data-alertz-holder]')

document.addEventListener('livewire:initialized', function (params) {
    Livewire.on('alertz', (data)=>{
        
        data = data[0]
        id = identifier()
        
        alertz_container.insertAdjacentHTML('beforeend', `
        <div class="alertz-container ${data['type']}" id='alertz-${id}'>
    
            <i class="fa-solid ${data['type'] == 'danger' ? 'fa-warning': 'fa-check'} alert-icon"></i>

            <div class="alert-content">
                <span class="h-95 bwe">${data['title']}</span>
                <span class="h-93">${data['message']}</span>
            </div>

            <div class="alert-status"></div>
        </div>
        `);

        auto_close('alertz-'+id)
    })
})  

function identifier() {
    let now = new Date();
    return `${now.getHours()}${now.getMinutes()}${now.getSeconds()}`;
}

function auto_close(id) {

    let target = document.getElementById(id)
    target.addEventListener('click', (e) => close_self(e, id))

    setTimeout(() => { 
        target.classList.add('active')

        target.addEventListener('animationend', function (params) {
            target.remove()
        })

    }, 3900);
}

function close_self(e, id) {
    ev = e.target.closest('#'+id )
    
    ev.classList.add('active')
    ev.addEventListener('animationend', function (event) {
        event.target.remove()
    })
}