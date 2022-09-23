@extends('layouts.admin')

@section('styles')
<link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('title')
Κατηγορίες Προϊόντων (Σύνολο: 7)
<button class="btn btn-outline-success ml-3" data-toggle="modal" data-target="#addCategory">+ Δημιουργία Κατηγορίας</button>
@endsection

@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header bg-success py-3">
            <h4 class="m-0 text-white">Κατηγορίες</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table style="color: #000; font-size: 17px" class="table table-bordered pb-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Όνομα Κατηγορίας</th>
                            <th>Αριθμός Προϊόντων</th>
                            <th>Συνολικό Απόθεμα</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>    
                        <tr>                
                            <td>Βούτυρα Κλασσικά</td>
                            <td>11</td>
                            <td style="color: green; font-weight:bold">75</td>
                            <td><a data-toggle="modal" data-target="#editCategory" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <tr>                
                            <td>Βούτυρα Φρέσκα</td>
                            <td>16</td>
                            <td style="color: green; font-weight:bold">75</td>
                            <td><a data-toggle="modal" data-target="#editCategory" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Γάλακτος</td>
                            <td>5</td>
                            <td style="color: red; font-weight:bold">3</td>
                            <td><a data-toggle="modal" data-target="#editCategory" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα με Άρωμα</td>
                            <td>3</td>
                            <td style="color: orange; font-weight:bold">34</td>
                            <td><a data-toggle="modal" data-target="#editCategory" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Αιγοπρόβεια</td>
                            <td>8</td>
                            <td style="color: green; font-weight:bold">22</td>
                            <td><a data-toggle="modal" data-target="#editCategory" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Με Γεύσεις</td>
                            <td>8</td>
                            <td style="color: red; font-weight:bold">9</td>
                            <td><a data-toggle="modal" data-target="#editCategory" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Σπέσιαλ</td>
                            <td>6</td>
                            <td style="color: red; font-weight:bold">14</td>
                            <td><a data-toggle="modal" data-target="#editCategory" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Δημιουργία Κατηγορίας</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Τίτλος Κατηγορίας</label>
                        <input type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Περιγραφή Κατηγορίας</label>
                        <textarea type="text" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Δημιουργία</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Επεξεργασία Κατηγορίας</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Τίτλος Κατηγορίας</label>
                        <input type="text" class="form-control" autocomplete="off" value="Βούτυρα Κλασσικά">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Περιγραφή Κατηγορίας</label>
                        <textarea type="text" class="form-control" rows="4">Βούτυρο εκλεκτής ποιότητας. Βούτυρο… όπως παλιά!</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Αποθήκευση</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('/admin-assets/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/admin-assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('#dataTable').DataTable({
    "paging" : true,
    "ordering" : true,
    "scrollCollapse" : true,
    "searching" : true,
    "bInfo": true
});
@endsection