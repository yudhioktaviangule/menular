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
                    <form action="{{route('materi.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=materi>Materi</label>
                                <p>{{$data->name}}</p>
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