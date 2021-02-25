@extends("template.index")
@section("title","Jadwal Try-Out")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Jadwal</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id='x'>
                                <thead>
                                    <tr>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tanggal Buka Registrasi</th>
                                        <th>Tanggal Tutup Registrasi</th>
                                        <th>Waktu(Menit)</th>
                                        <th>Tempat</th>
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
            let url = `{{  route('dtb.jadwal') }}`;
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
                    {name:'tanggal_mulai',data:'tanggal_mulai'},
                    {name:'tanggal_selesai',data:'tanggal_selesai'},
                    {name:'buka_regis',data:'buka_regis'},
                    {name:'tutup_regis',data:'tutup_regis'},
                    {name:'tempat',data:'tempat'},
                    {name:'aksi',data:'aksi'},
                ]
            })
        });
    </script>
@endsection