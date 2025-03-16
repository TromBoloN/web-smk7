<div>
    <form class="search-container mb-5 search-ms">
        <input wire:model.live='search' name="query" type="text" placeholder='New Search'>
        <button>
            <i class="fa-solid fa-search"></i>
        </button>
    </form>

    @if ($gallery->count() > 0)
        <section class="table-scroll">
            <table class="data-table">
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Caption</th>
                    <th>Action</th>
                </tr>
                @php
                    $no = 1;
                @endphp
                @forelse ($gallery as $gall)
                    <tr>
                        <td>{{ $no }}</td>
                        <td><img src="{{ asset("storage/$gall->image") }}" alt=""></td>
                        <td>{{ $gall->caption }}</td>
                        <td><i class="fa-solid fa-ellipsis tabz-open" data-tabz-dropdown-open='{{ $gall->id }}'
                                data-tabz-target="dropdown_action"></i></td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @empty
                    {{-- <tr><td>Not Found</td></tr> --}}
                @endforelse
            </table>
        </section>
    @else
        <div class='not-found-image-container'>
            <img class='not-found-data' src="{{ asset('images/not-found.png') }}" alt="">
        </div>
    @endif

    @if ($gallery->count() > 0)
        <div class="mb-extra d-flex justify-content-center mt-4">
            {{ $gallery->links() }}
        </div>
    @endif

</div>
