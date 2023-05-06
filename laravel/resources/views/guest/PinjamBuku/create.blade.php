@extends($guest)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
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
                        <form class="forms-sample" action="{{ url('guest/pinjam-buku') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idUsers" value="{{ session()->get('id') }}">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Buku</label>
                                <select class="form-select" id="exampleSelect" name="idBuku">
                                    <option selected disabled>--Pilih Salah Satu--</option>
                                    @foreach ($buku as $p)
                                        <option name="idBuku" value="{{ $p->id }}">{{ $p->judul_buku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tanggal_pinjam" id="exampleInputName1"
                                    placeholder="contoh : admin" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alasan Pinjam</label>
                                <input type="text" class="form-control" name="alasan" id="exampleInputName1"
                                    placeholder="contoh : Butuh" required>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <a href="#"><button class="btn btn-light">Cancel</button></a>
                        </form>
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
