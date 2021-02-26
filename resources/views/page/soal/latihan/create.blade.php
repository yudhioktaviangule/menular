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
                            <a href="{{ route('soal_latihan.index') }}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('soal_latihan.store')}}" method="POST">
                        @csrf
                        
                        <input type="hidden" name='bab_materi_id' value='0'>
                        <input type="hidden" name='jadwal_id' value='0'>
                        <input type="hidden" name="jenis" value="latihan">
                        
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=materi>Materi</label>
                                <select name="materi_id" id="materi" required class="form-control">
                                    <option value="">PILIH MATERI</option>
                                    @foreach($data as $key => $value)
                                        <option value="{{$value->id}}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for=editor>Soal</label>
                                <textarea name="isi" id="editor" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <p>
                                Caption Jawaban (A,B,C,D,E)
                            </p>
                            <div class="row">
                                
                                <div class="form-group col">                                    
                                    <label for="">A</label><input type="text" class="form-control" name="json[pilihan][a]">
                                </div>
                                <div class="form-group col">
                                    <label for="">B</label><input type="text" class="form-control" name="json[pilihan][b]">
                                </div>
                                <div class="form-group col">
                                    <label for="">C</label><input type="text" class="form-control" name="json[pilihan][c]">
                                </div>
                                <div class="form-group col">
                                    <label for="">D</label><input type="text" class="form-control" name="json[pilihan][d]">
                                </div>
                                <div class="form-group col">
                                    <label for="">E</label><input type="text" class="form-control" name="json[pilihan][e]">
                                </div>
                            </div>
                            <p>Poin Jawaban</p>
                            <div class="row">
                            <div class="form-group col">                                    
                                    <label for="">A</label><input type="number" max=5 min=0 value=0  class="form-control" name="json[jawaban][a]">
                                </div>
                                <div class="form-group col">
                                    <label for="">B</label><input type="number" max=5 min=0 value=0  class="form-control" name="json[jawaban][b]">
                                </div>
                                <div class="form-group col">
                                    <label for="">C</label><input type="number" max=5 min=0 value=0  class="form-control" name="json[jawaban][c]">
                                </div>
                                <div class="form-group col">
                                    <label for="">D</label><input type="number" max=5 min=0 value=0  class="form-control" name="json[jawaban][d]">
                                </div>
                                <div class="form-group col">
                                    <label for="">E</label><input type="number" max=5 min=0 value=0  class="form-control" name="json[jawaban][e]">
                                </div>
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
            window.ckEdWUpd('#editor')
            
        });
    </script>
@endsection