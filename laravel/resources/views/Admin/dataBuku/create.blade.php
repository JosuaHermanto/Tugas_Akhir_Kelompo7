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
                        <form class="forms-sample" action="{{ url('admin/data-buku') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Foto Buku</label>
                                {{-- <input type="text" class="form-control" name="judul_buku" id="exampleInputName1"
                                    placeholder="Judul Buku" required> --}}
                                <input type="file" class="form-control" id="validatedCustomFile" name="photo" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku" id="exampleInputName1"
                                    placeholder="Judul Buku" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Pengarang Buku</label>
                                <input type="text" class="form-control" name="pengarang_buku" id="exampleInputName1"
                                    placeholder="examp : Josua" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Penerbit Buku</label>
                                <input type="text" class="form-control" name="penerbit_buku" id="exampleInputName1"
                                    placeholder="examp : gramedia" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">tahun Buku</label>
                                <input type="date" class="form-control" name="tahun_buku" id="exampleInputName1"
                                    placeholder="examp : 2023" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat Penerbit</label>
                                <input type="text" class="form-control" name="alamat_penerbit" id="exampleInputName1"
                                    placeholder="examp : Jakarta" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Sinopsis</label>
                                <input type="text" class="form-control" name="sinopsis" id="exampleInputName1"
                                    value="Harry Potter is an ordinary boy who lives in a cupboard under the stairs at his Aunt Petunia and Uncle Vernon's house, which he thinks is normal for someone like him who's parents have been killed in a 'car crash'. He is bullied by them and his fat, spoilt cousin Dudley, and lives a very unremarkable life with only the odd hiccup (like his hair growing back overnight!) to cause him much to think about. That is until an owl turns up with a letter addressed to Harry and all hell breaks loose!"
                                    required>
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
