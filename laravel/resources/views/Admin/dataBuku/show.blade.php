@extends($admin)

@section('css-library')
    <style>
        .book-info {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .book-cover {
            margin-right: 1rem;
        }

        .book-cover img {
            max-width: 100%;
            height: auto;
        }

        .book-details {
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .book-info {
                flex-direction: column;
                text-align: center;
            }

            .book-cover {
                margin-bottom: 1rem;
                margin-right: 0;
            }
        }
    </style>
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $page }}</h4>
                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        <div class="book-info">
                            <div class="book-cover">
                                @if ($buku->foto)
                                    <img src="{{ asset('upload/buku/' . $buku->foto) }}" alt="gambar gagal load"
                                        class="d-block w-100" height="500">
                                @else
                                    <img>
                                @endif
                            </div>
                            <div class="book-details">
                                <h2>Judul Buku :{{ $buku->judul_buku }}</h2>
                                <p>Pengarang: {{ $buku->pengarang_buku }}</p>
                                <p>Penerbit:{{ $buku->penerbit_buku }}</p>
                                <p>Tahun Terbit: {{ $buku->tahun_buku }}</p>
                                <p>Jumlah Halaman: 223</p>
                                <p>Sinopsis: {{ $buku->sinopsis }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
