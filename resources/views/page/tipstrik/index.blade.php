@extends("template.index")
@section("title","Tips dan Trick")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tips dan Trick</h3>
                        <div class="card-tools">
                            <a href="{{ route('trik.create') }}" class="btn btn-sm btn-primary">
                                Tambah Tips dan Trick
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nilai</th>
                                        <th>Tips/Trick</th>
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
                                            <td>{{$value->tips=="-" ? $value->trick:$value->tips}}</td>
                                            <td>{{$value->tips=="-" ? "TIPS":"TRICK"}}</td>
                                            <td>
                                                <div class="text-right">
                                                    <a href="#" onclick='hapus(`{{route("trik.destroy",["trik"=>$value->id])}}`)' class="btn btn-sm btn-danger">Hapus</a>
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