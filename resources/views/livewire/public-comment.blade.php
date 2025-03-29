<div class="fcol g-2 w-100 comment-list">

    <select wire:model.live='sort'  name="sort" id="" class="sort">
        <option value="asc">Oldest</option>
        <option value="desc">Newest</option>
    </select>
    

<div wire:loading.remove wire:target='deleteComment'>
<div wire:loading.remove wire:target='sort' class="fcol g-2 w-100 comment-holder">
@if ($comments->count() > 0)
@foreach ($comments as $item)
    <section class="comment-content aifstart frow g-2">
        <i class="fa-solid fa-user user-profile"></i>
    
        <div class="fcol  g-1 w-100">
            <div class="frow jcsbetween aicenter">
                <div class="h-94 sbwe">{{$item->name}}</div>
                <i class="fa-solid fa-trash delete-icon" wire:click="deleteComment({{$item->id}})"></i>
            </div>
            <div class="comment-text trunc">{{$item->comment}}</div>
    
            <div class="read-more" data-showed="false">Read More</div>
        </div>
        
    </section>
    @endforeach
    @else
    <h2 class="h-95 w-100 tacenter mt-30">Belum ada komentar!</h2>
    
@endif

    </div>
</div>
    <div  wire:loading.class.remove='load-dis' class="loading load-dis w-100">
        <img src="{{asset('images/load.svg')}}" alt="" class="loading" width="40">
    </div>
    
    @if ($comments->count() >= 3 && $take < $actual_amount_comment )
    <div class="frow jccenter load-more aicenter g-1 h-95 w-100 " wire:loading.class.add='load-await'> 
        <section wire:click="loadMore()" class="frow load-more-content g-1 aicenter"><i class="fa-solid fa-caret-down"></i> <span>Load More</span></section>
    </div>
    @endif

    <script src="{{asset('js/livewire-alertz.js')}}"></script>

    <script>
        let comment_start_trunc = document.querySelectorAll('.comment-text')
        
        function startTruncate() {
            setTimeout(() => {
                comment_start_trunc.forEach(el => {                
                const isTrunc = el.scrollHeight > el.clientHeight;
                if (!isTrunc && el.nextElementSibling) {                    
                    el.nextElementSibling.remove();
                }
            });
            }, 0);
        }
    
        setTimeout(() => {
            startTruncate()
        }, 0);
    </script>
    
    @script
    <script>
        
        checkTruncation()
        seeMoreFunc()

        function checkTruncation() {
            let comment_truncate = document.querySelectorAll('.comment-text')
            comment_truncate.forEach(el => {
                const isTrunc = el.scrollHeight > el.clientHeight;
                if (!isTrunc && el.nextElementSibling) {
                el.nextElementSibling.remove();
                }
            });
        }
    
        Livewire.hook('commit',  ({ component, commit, respond, succeed, fail }) => {
            
            succeed(({ snapshot, effect }) => {
                setTimeout(() => {
                    seeMoreFunc()
                    checkTruncation()
                }, 0);
            })
        })
        
       function seeMoreFunc(params) {
        let see_mores = document.querySelectorAll('.read-more')
    
        see_mores.forEach((element, ind) => {
            element.addEventListener('click', function(el){
    
                elem = el.target
    
                if (elem.dataset.showed != 'true') {
                    elem.dataset.showed = 'true'
                    elem.previousElementSibling.classList.remove('trunc');
                    elem.textContent = 'Show Less'
                }else{
                    elem.dataset.showed = 'false'
                    elem.previousElementSibling.classList.add('trunc');
                    elem.textContent = 'Read More'
                }
                
            })
        });
       }
    </script>
    @endscript
    
    </div>