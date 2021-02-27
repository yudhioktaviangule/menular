@extends("template.index")
@section("title","Tips dan Trik")

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tips dan Trik</h3>
                        <div class="card-tools">
                            <a href="{{ route('trik.index') }}" class="btn btn-sm bg-teal">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{route('trik.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class='form-group'>
                                <label for=trik>Nilai</label>
                                <input class='form-control form-control-sm' name='nilai' id='trik'>
                            </div>
                            <div class='form-group'>
                                <label for=jenis>Jenis</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="tips">TIPS</option>
                                    <option value="trick">TRICK</option>
                                </select>
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