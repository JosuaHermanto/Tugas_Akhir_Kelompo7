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
                        <form class="forms-sample" action="{{ url("$url/update") }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $pinjam->id }}">
                            <input type="hidden" name="idUsers" value="{{ session()->get('id') }}">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Buku</label>
                                <select class="form-select" id="exampleSelect" name="idBuku">
                                    <option selected disabled>--Pilih Salah Satu--</option>
                                    @foreach ($buku as $p)
                                        <option name="idBuku" value="{{ $p->id }}" selected>{{ $p->judul_buku }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tanggal_pinjam" id="exampleInputName1"
                                    placeholder="contoh : admin" value="{{ $pinjam->tanggal_pinjam }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alasan Pinjam</label>
                                <input type="text" class="form-control" name="alasan" id="exampleInputName1"
                                    placeholder="contoh : Butuh" value="{{ $pinjam->alasan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Status Kembali</label>
                                <select class="form-select" id="exampleSelect" name="status_kembali">
                                    <option selected disabled>--Pilih Salah Satu--</option>
                                    {{-- <option name="status_pinjam" value="{{ $pinjam->status_pinjam }}" selected> --}}
                                    <option value="1">Kembali</option>
                                    <option value="0">Belum Kembali</option>
                                    </option>

                                </select>
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
