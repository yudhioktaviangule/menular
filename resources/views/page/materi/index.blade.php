@extends("template.index")
@section("title","Materi")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materi</h3>
                        <div class="card-tools">
                            <a href="{{ route('materi.create') }}" class="btn btn-sm btn-primary">
                                Tambah Materi
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Materi</th>
                                        <th class='text-right'>
                                            <div class="btn btn-sm btn-default">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{$value->name}}</td>
                                            <td>
                                                <div class="text-right">
                                                    <a href="{{route('materi.show',['materi'=>$value->id])}}" class="btn btn-sm btn-primary">Lihat</a>
                                                    <a href="{{route('materi.edit',['materi'=>$value->id])}}" class="btn btn-sm btn-success">Ubah</a>
                                                    <a href="{{route('sub_materi.index')}}?mt={{$value->id}}" class="btn btn-sm btn-warning">Tambahkan Sub Materi</a>
                                                    <a href="#" onclick='hapus(`{{route("materi.destroy",["materi"=>$value->id])}}`)' class="btn btn-sm btn-danger">Hapus</a>
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
    </div>
@endsection