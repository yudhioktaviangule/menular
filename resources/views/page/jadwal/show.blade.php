@extends("template.index")
@section("title","Jadwal Try Out")
@php 
    $carb = \Carbon\Carbon::class;
@endphp
@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Jadwal</h3>
                        <div class="card-tools">
                            <a href="{{ route('jadwal.index') }}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('jadwal.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=materi>Tanggal Mulai</label>
                                <p>{{$carb::parse($data->tanggal_ujian)->format('d-m-Y')}}</p>
                            </div>
                            <div class='form-group'>
                                <label for=materi>Tanggal Selesai</label>
                                <p>{{$carb::parse($data->tanggal_Selesai)->format('d-m-Y')}}</p>
                            </div>
                            <div class='form-group'>
                                <label for=materi>Tanggal Buka Registrasi</label>
                                <p>{{$carb::parse($data->buka_regis)->format('d-m-Y')}}</p>
                            </div>
                            <div class='form-group'>
                                <label for=materi>Tanggal Tutup Registrasi</label>
                                <p>{{$carb::parse($data->buka_regis)->format('d-m-Y')}}</p>
                            </div>
                            <div class='form-group'>
                                <label for=materi>Tanggal Tutup Registrasi</label>
                                <p>{{$carb::parse($data->tutup_regis)->format('d-m-Y')}}</p>
                            </div>
                            <div class='form-group'>
                                <label for=materi>Tanggal Tutup Registrasi</label>
                                <p>{{ ($data->waktu_ujian/60)." Menit" }}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection