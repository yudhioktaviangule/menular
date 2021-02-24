@extends("template.index")
@section("title","QUIZ")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$smat->getMateri()->name}} BAB {{$smat->bab}}</h3>
                        <div class="card-tools">
                            <a href="{{ route('quiz.create') }}?sm={{$smat->id}}" class="btn btn-sm btn-primary">
                                Tambah Quiz
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id='x'>
                                <thead>
                                    <tr>
                                        <th>Soal Quiz</th>
                                        <th class='text-right'>
                                            <div class="btn btn-sm btn-default">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section("js")
    <script>
        $(document).ready(()=>{
            var obj; 
            let url = `{{route('dtb.soal',[
                'jenis' => 'q',
                'materi_id' => 0,
                'smateri_id' => $smat->id
            ]) }}`;
            obj=$("#x").DataTable({
                serverSide:true,
                processing:true,
                ajax:url,
            })
        });
    </script>
@endsection