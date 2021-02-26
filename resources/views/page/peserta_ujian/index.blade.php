@extends("template.index")
@section("title","Verifikasi Peserta Try Out")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Peserta Try Out</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id='x'>
                                <thead>
                                    <tr>
                                        <th>E-Mail</th>
                                        <th>Nama</th>
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
            let url = `{{  route('dtb.peserta') }}`;
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
                    {name:'name',data:'name'},
                    {name:'email',data:'email'},
                    {name:'aksi',data:'aksi'},
                ]
            })
        });
    </script>
@endsection