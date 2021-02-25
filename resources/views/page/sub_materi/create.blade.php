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
                            <a href="{{ route('sub_materi.index') }}?mt={{$cek->id}}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('sub_materi.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name='materi_id' value='{{$cek->id}}'>
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=materi>Bab</label>
                                <input maxlength=3 class='form-control form-control-sm' name='bab' value="" id='materi'>
                            </div>
                        
                            <div class='form-group'>
                                <label for=materi>Isi</label>
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
            window.tk = `{{Auth::user()->remember_token}}`;
            window.ckEdNUpd('#editor')
        });
    </script>
@endsection