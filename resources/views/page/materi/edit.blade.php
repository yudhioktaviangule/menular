@extends("template.index")
@section("title","Materi")

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materi</h3>
                        <div class="card-tools">
                            <a href="{{ route('materi.index') }}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('materi.update',['materi'=>$data->id])}}" method="POST">
                        <div id="update"></div>
                        @csrf
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=materi>Materi</label>
                                <input class='form-control form-control-sm' name='name' value="{{$data->name}}" id='materi'>
                            </div>
                            <<div class='form-group'>
                                <label for=materi>Poin Min. Kelulusan</label>
                                <input class='form-control form-control-sm' name='poin_lulus' value="{{$data->poin_lulus}}" id='materi' type='number'>
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