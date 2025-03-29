@if (session('title') && session('message') && session('type'))    
<div class="alertz-container {{session('type')}}">
    
    <i class="fa-solid  {{ session('type') == 'danger' ? 'fa-warning' : 'fa-check'}} alert-icon"></i>

    <div class="alert-content">
        <span class="h-95 bwe">{{session('title')}}</span>
        <span class="h-93">{{session('message')}}</span>
    </div>

    <div class="alert-status"></div>
</div>

<script>
    let alertz = document.querySelector('.alertz-container')
    
    setTimeout(() => { 
        alertz.classList.add('active')
    }, 3900);
    
    function close_self(e) {
        ev = e.target.closest('.alertz-container')
        
        ev.classList.add('active')
        ev.addEventListener('animationend', function (event) {
            event.target.remove()
        })
    }

    alertz.addEventListener('click', close_self)

</script>
@endif