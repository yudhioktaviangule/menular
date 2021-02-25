@extends("template.index")
@section("title","Jadwal Try Out")

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Jadwal </h3>
                        <div class="card-tools">
                            <a href="{{ route('jadwal.index') }}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('jadwal.update',['jadwal'=>$data->id])}}" method="POST">
                        <div id="auth"></div>
                        <div id="update"></div>
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=tanggal_ujian>Tanggal Mulai</label>
                                <input value="{{$data->tanggal_ujian}}" required type='date' class='form-control form-control-sm' name='tanggal_ujian'  id='tanggal_ujian'>
                            </div>
                            <div class='form-group'>
                                <label for=tanggal_selesai>Tanggal Selesai</label>
                                <input value="{{$data->tanggal_selesai}}" required type='date' class='form-control form-control-sm' name='tanggal_selesai'  id='tanggal_selesai'>
                            </div>
                            <div class='form-group'>
                                <label for=buka_regis>Tanggal Buka Registrasi</label>
                                <input value="{{$data->buka_regis}}" required type='date' class='form-control form-control-sm' name='buka_regis'  id='buka_regis'>
                            </div>
                            <div class='form-group'>
                                <label for=tutup_regis>Tanggal Tutup Registrasi</label>
                                <input value="{{$data->tutup_regis}}" required type='date' class='form-control form-control-sm' name='tutup_regis'  id='buka_regis'>
                            </div>
                            <div class='form-group'>
                                <label for=waktu_ujian>Waktu Ujian (Menit)</label>
                                <input value="{{intval($data->waktu_ujian/60)}}" required type='number' min=10 class='form-control form-control-sm' name='waktu_ujian'  id='buka_regis'>
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