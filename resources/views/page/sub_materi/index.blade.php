@extends("template.index")
@section("title","$cek->name")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$cek->name}}</h3>
                        <div class="card-tools">
                            <a href="{{ route('sub_materi.create') }}?mt={{$cek->id}}" class="btn btn-sm btn-primary">
                                Tambah Sub Materi
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id='lexicon'>
                                <thead>
                                    <tr>
                                        <th>Bab</th>
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
                                            <td style='width:50%'>
                                                <p>
                                                    BAB {{$value->bab}}
                                                </p>
                                                <p style='width:50%'>
                                                    @php
                                                    $json = json_decode($value->isi);
                                                    @endphp
                                                   
                                                    {!!substr($json->materi,0,50)!!}...
                                                    <a href="{{route('sub_materi.show',['sub_materi'=>$value->id])}}">Selengkapnya</a>
                                                </p>
                                            </td>
                                            <td>
                                                <div class="text-right">
                                                    
                                                    <a href="{{route('quiz.utama',['sm' => $value->id])}}" class="btn btn-sm btn-primary">Quiz</a>
                                                    <a href="{{route('sub_materi.edit',['sub_materi'=>$value->id])}}" class="btn btn-sm btn-success">Ubah</a>
                                                    
                                                    <a href="#" onclick='hapus(`{{route("sub_materi.destroy",["sub_materi"=>$value->id])}}`)' class="btn btn-sm btn-danger">Hapus</a>
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
