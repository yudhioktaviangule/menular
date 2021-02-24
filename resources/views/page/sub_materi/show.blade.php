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
                            <a href="{{ route('sub_materi.index') }}?mt={{$data->materi_id}}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('materi.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class='form-group'>
                                
                                <p>{!!$isi!!}</p>
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