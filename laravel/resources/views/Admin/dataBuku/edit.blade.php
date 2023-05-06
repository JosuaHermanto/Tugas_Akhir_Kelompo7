@extends($admin)

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
                        <form class="forms-sample" action="{{ url("$url/update") }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $buku->id }}">
                            <div class="form-group">
                                <label for="exampleInputName1">Foto Buku</label>
                                {{-- <input type="text" class="form-control" name="judul_buku" id="exampleInputName1"
                                    placeholder="Judul Buku" required> --}}
                                <input type="file" class="form-control" id="validatedCustomFile" name="photo" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku" id="exampleInputName1"
                                    placeholder="Judul Buku" value="{{ $buku->judul_buku }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Pengarang Buku</label>
                                <input type="text" class="form-control" name="pengarang_buku" id="exampleInputName1"
                                    placeholder="examp : Josua" value="{{ $buku->pengarang_buku }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Penerbit Buku</label>
                                <input type="text" class="form-control" name="penerbit_buku" id="exampleInputName1"
                                    placeholder="examp : gramedia" value="{{ $buku->penerbit_buku }}"required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">tahun Buku</label>
                                <input type="text" class="form-control" name="tahun_buku" id="exampleInputName1"
                                    placeholder="examp : 2023" value="{{ $buku->tahun_buku }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat Penerbit</label>
                                <input type="text" class="form-control" name="alamat_penerbit" id="exampleInputName1"
                                    placeholder="examp : Jakarta" value="{{ $buku->alamat_penerbit }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Sinopsis</label>
                                <input type="text" class="form-control" name="sinopsis" id="exampleInputName1"
                                    value="{{ $buku->sinopsis }}" required>
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
