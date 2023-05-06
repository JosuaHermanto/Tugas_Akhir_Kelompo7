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
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <input type="hidden" name="idDivisi" value="1">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Admin</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName1"
                                    placeholder="Admin Baru" value="{{ $users->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputName1"
                                    placeholder="contoh : admin" value="{{ $users->username }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password</label>
                                <input type="text" class="form-control" name="password" id="exampleInputName1"
                                    placeholder="Masukan Katasandi Baru" value="{{ $users->sandi }}" required>
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
