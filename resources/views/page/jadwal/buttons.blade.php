
@if($data->aktif=='tidak')
    <a href="{{ route('peserta.show',['pesertum'=>$data->id]) }}" class="btn btn-sm btn-primary">
        <i class="fas fa-check"></i> Verifikasi
    </a>
@else
    <a href="{{ route('peserta.ban',['id'=>$data->id]) }}" class="btn btn-sm btn-danger">
        <i class="fas fa-times"></i> Banned
    </a>
@endif
