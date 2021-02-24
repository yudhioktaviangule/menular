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
                            <a href="{{ route('sub_materi.index') }}?mt={{$data->materi_id}}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('sub_materi.update',['sub_materi'=>$data->id])}}" method="POST">
                        @csrf
                        <div id="auth"></div>
                        <div id="update"></div>
                        <input type="hidden" name='materi_id' value='{{$data->materi_id}}'>
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=materi>Bab</label>
                                <input maxlength=3 class='form-control form-control-sm' name='bab' value="{{$data->bab}}" id='materi'>
                            </div>
                            <div class='form-group'>
                                <label for=materi>Isi</label>
                                <textarea name="materi" id="editor" cols="30" rows="10" class="form-control">{{$isi}}</textarea>
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
            ClassicEditor.create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
        });
    </script>
@endsection