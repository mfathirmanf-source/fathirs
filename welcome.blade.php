@extends('masterlayout')

@section('content')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">

            {{-- Tombol Tambah --}}
            <div class="col-md-4">
                <div class="card shadow-sm d-flex justify-content-center align-items-center" style="height: 640px;">

                    <button class="btn btn-success rounded-circle" style="width: 100px; height: 100px; font-size: 50px;"
                        data-bs-toggle="modal" data-bs-target="#tambahModal">
                        +
                    </button>

                </div>
            </div>

            {{-- Daftar Biodata --}}
            @foreach ($biodatas as $biodata)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">

                        @if ($biodata->foto)
                            <img src="{{ asset('storage/' . $biodata->foto) }}" class="card-img-top"
                                style="height: 390px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex justify-content-center align-items-center" style="height: 390px;">
                                Tidak ada foto
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">

                            <h5 class="fw-bold">{{ $biodata->nama }}</h5>

                            <p class="text-secondary">
                                NIM: {{ $biodata->nim }}
                            </p>

                            <p>{{ $biodata->deskripsi }}</p>

                            <div class="mt-auto">

                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $biodata->id }}">
                                    Edit
                                </button>

                                <form action="{{ route('biodata.destroy', $biodata->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus biodata?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-danger btn-sm">
                                        Hapus
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Edit --}}
                <div class="modal fade" id="edit{{ $biodata->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form action="{{ route('biodata.update', $biodata->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Biodata</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control mb-3"
                                        value="{{ $biodata->nama }}" required>

                                    <label class="form-label">NIM</label>
                                    <input type="text" name="nim" class="form-control mb-3"
                                        value="{{ $biodata->nim }}" required>

                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control mb-3" required>{{ $biodata->deskripsi }}</textarea>

                                    <label class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" accept="image/*">

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                    <button type="submit" class="btn btn-primary">
                                        Simpan Perubahan
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Biodata</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control mb-3" required>

                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control mb-3" required>

                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control mb-3" required></textarea>

                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                        <button type="submit" class="btn btn-success">
                            Simpan Biodata
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection