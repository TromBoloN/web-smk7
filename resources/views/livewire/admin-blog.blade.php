<div>
    <form class="search-container mb-5 search-ms">
        <input wire:model.live='search' name="query" type="text" placeholder='New Search'>
        <button>
            <i class="fa-solid fa-search"></i>
        </button>
    </form>

    @if ($posts->count() > 0)

        <section class="table-scroll">

            <table class="data-table">
                <tr>
                    <th>No.</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Editor's Choice</th>
                    <th>Actions</th>
                </tr>

                @php
                    $no = 1;
                @endphp
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $no }}</td>
                        <td><img src="{{ asset("storage/$post->thumbnail") }}" alt=""></td>
                        <td style="--force-width: 300px">{{ $post->title }}</td>
                        <td>{{ $post['user']['username'] }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->is_editors_choice == 1 ? 'Active' : 'Inactive' }}</td>
                        <td><i class="fa-solid fa-ellipsis tabz-open" data-tabz-dropdown-open='{{ $post->id }}'
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

    <div class="mb-extra d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</div>


