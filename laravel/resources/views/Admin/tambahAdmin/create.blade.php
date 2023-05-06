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
                        <form class="forms-sample" action="{{ url('admin/tambah-admin') }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="idDivisi" value="1"> --}}
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Admin</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName1"
                                    placeholder="Admin Baru">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputName1"
                                    placeholder="contoh : admin">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputName1"
                                    placeholder="contoh : admin">
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
