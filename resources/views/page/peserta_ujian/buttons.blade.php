@if($data->verified_by=='0')
    <a href="{{ route('verif.show',['verif'=>$data->id]) }}" class="btn btn-primary btn-sm">
        <i class="fas fa-check"></i> Verifikasi
    </a>
@endif