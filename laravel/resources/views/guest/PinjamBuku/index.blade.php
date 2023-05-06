@extends($guest)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ url("$url/create", []) }}" class="btn btn-sm btn-primary float-end">Tambah Buku
                                Pinjaman</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama </th>
                                    <th>Judul</th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjam as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->users->nama }}</td>
                                        <td>{{ $p->buku->judul_buku }}</td>
                                        <td>
                                            <div class="btn-group btn-group-square" role="group" aria-label="">
                                                <a href="{{ url("$url/" . $p->id, []) }}" class="btn btn-primary"
                                                    title="Ubah Data">Show</a>
                                                {{-- <a href="javascript:void(0);" class="btn btn-danger" title="Hapus Data">Hapus</a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
