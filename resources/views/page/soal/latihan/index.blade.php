@extends("template.index")
@section("title","Soal Latihan")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Soal Latihan</h3>
                        <div class="card-tools">
                            <a href="{{ route('soal_latihan.create') }}" class="btn btn-sm btn-primary">
                                Tambah Soal
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id='x'>
                                <thead>
                                    <tr>
                                        <th>Soal</th>
                                        <th>Jawaban</th>
                                        <th>Poin Jawaban</th>
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
            let token = `{{ Auth::user()->remember_token }}`;
            let url = `{{route('dtb.soal',[
                'jenis' => 'latihan',
                'materi_id' => 0,
                'smateri_id' => 0
            ]) }}`;
            obj=$("#x").DataTable({
                serverSide:true,
                processing:true,
                ajax:{
                    url:url,
                    beforeSend:(xhr)=>{
                        xhr.setRequestHeader('Authorization',`Bearer ${token}`)
                    }
                },
                columns:[
                    {name:'soal',data:'soal'},
                    {name:'jawaban',data:'jawaban'},
                    {name:'poin',data:'poin'},
                    {name:'aksi',data:'aksi'},
                ]
            })
        });
    </script>
@endsection