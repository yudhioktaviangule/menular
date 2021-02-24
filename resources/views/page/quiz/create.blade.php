@extends("template.index")
@section("title","Materi")

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materi</h3>
                        <div class="card-tools">
                            <a href="{{ route('quiz.utama',['sm' => $data->id]) }}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('quiz.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name='materi_id' value='0'>
                        <input type="hidden" name='bab_materi_id' value='0'>
                        <div class="card-body">
                            
                            <div class='form-group'>
                                <label for=materi>Soal</label>
                                <textarea name="materi" id="editor" cols="30" rows="10" class="form-control"></textarea>
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
@section('js')
    <script>
        $(document).ready(()=>{

        });
    </script>
@endsection