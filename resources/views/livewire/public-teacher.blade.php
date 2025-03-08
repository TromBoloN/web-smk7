<div>
    <form class="search-container mb-5 search-full">
        <button>
            <i class="fa-solid fa-search"></i>
        </button>
        <input wire:model.live='search' name="query" type="text" placeholder='Cari Nama Guru atau Subjek ajar'>
    </form>

    <section class="teachers-list">
        @if ($gurus->count() > 0)
            @foreach ($gurus as $guru)
                <section class="teacher-container">

                    <div class="background-teacher">
                        <img src="{{ asset('images/Background-teacher.png') }}" alt="">
                    </div>
                    <div class="teacher-photo">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                    </div>

                    <h5 class="teacher-name disguise">{{ $guru->nama }}</h5>
                    <section class="teacher-info">
                        <h5 class="teacher-name">{{ $guru->nama }}</h5>
                        <p class="teacher-subject">{{ $guru->mapel }}</p>
                    </section>

                </section>
            @endforeach
        @else
            <div class='not-found-image-container'>
                <img class='not-found-data' src="{{ asset('images/not-found.png') }}" alt="">
            </div>

        @endif

    </section>
</div>
