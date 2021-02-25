<div class="text-right">
    <a href="{{route('jadwal.show',['jadwal'=>$data->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Lihat</a>
    <a href="{{route('jadwal.edit',['jadwal'=>$data->id])}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="#" onclick="hapus(`{{ route('jadwal.destroy',['jadwal'=>$data->id]) }}`)" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Hapus</a>
</div>