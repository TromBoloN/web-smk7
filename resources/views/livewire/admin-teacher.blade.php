<div>
    <form class="search-container mb-5 search-ms">
        <input wire:model.live='search' name="query" type="text" placeholder='New Search'>
        <button>
            <i class="fa-solid fa-search"></i>
        </button>
    </form>

    @if ($teachers->count() > 0)
        <section class="table-scroll">
            <table class="data-table">
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                @php
                    $no = 1;
                @endphp
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $no }}</td>
                        <td><img src="{{ asset("storage/$teacher->foto") }}" alt=""></td>
                        <td>{{ $teacher->nama }}</td>
                        <td>{{ $teacher->mapel }}</td>
                        <td><i class="fa-solid fa-ellipsis tabz-open" data-tabz-dropdown-open='{{ $teacher->guru_id }}'
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

    @if ($teachers->count() > 0)
        <div class="mb-extra d-flex justify-content-center mt-4">
            {{ $teachers->links() }}
        </div>
    @endif

</div>
