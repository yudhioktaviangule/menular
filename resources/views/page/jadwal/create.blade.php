@extends("template.index")
@section("title","Jadwal Try Out")

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Jadwal Try Out</h3>
                        <div class="card-tools">
                            <a href="{{ route('jadwal.index') }}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('jadwal.store')}}" method="POST">
                        <div id="auth"></div>
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=tanggal_ujian>Tanggal Mulai</label>
                                <input required type='date' class='form-control form-control-sm' name='tanggal_ujian'  id='tanggal_ujian'>
                            </div>
                            <div class='form-group'>
                                <label for=tanggal_selesai>Tanggal Selesai</label>
                                <input required type='date' class='form-control form-control-sm' name='tanggal_selesai'  id='tanggal_selesai'>
                            </div>
                            <div class='form-group'>
                                <label for=buka_regis>Tanggal Buka Registrasi</label>
                                <input required type='date' class='form-control form-control-sm' name='buka_regis'  id='buka_regis'>
                            </div>
                            <div class='form-group'>
                                <label for=tutup_regis>Tanggal Tutup Registrasi</label>
                                <input required type='date' class='form-control form-control-sm' name='tutup_regis'  id='buka_regis'>
                            </div>
                            <div class='form-group'>
                                <label for=waktu_ujian>Waktu Ujian (Menit)</label>
                                <input required type='number' min=10 class='form-control form-control-sm' name='waktu_ujian'  id='buka_regis'>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection