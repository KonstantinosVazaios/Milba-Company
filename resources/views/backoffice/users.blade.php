@extends('layouts.admin')

@section('styles')
<link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('title')
Πελάτες (Σύνολο: 140)
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header bg-success py-3">
        <h4 class="m-0 text-white">Προϊόντα</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table style="color: #000; font-size: 17px" class="table table-bordered pb-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Όνομα</th>
                        <th>Τηλέφωνο</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>    
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr> 
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td>ΓΙΩΡΓΟΣ ΠΑΠΑΔΟΠΟΥΛΟΣ</td>
                        <td>6983402186</td>
                        <td>papandopoulosgiorgos@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <tr>                
                        <td> ΠΑΝΑΓΙΩΤΗΣ ΓΙΑΝΝΙΚΗΣ</td>
                        <td>6946100373</td>
                        <td>panagiotisgiannikis@gmail.com</td>
                        <td><a class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/admin-assets/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/admin-assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('#dataTable').DataTable({
    "paging" : false,
    "ordering" : true,
    "scrollCollapse" : true,
    "searching" : true,
    "bInfo": true
});
</script>
@endsection