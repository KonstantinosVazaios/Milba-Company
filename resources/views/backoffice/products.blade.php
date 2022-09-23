@extends('layouts.admin')

@section('styles')
<link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('title')
Προϊόντα (Σύνολο: 50)
<button class="btn btn-outline-success ml-3" data-toggle="modal" data-target="#addProduct">+ Δημιουργία Προϊόντος</button>
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
                            <th>Ανήκει στην Κατηγορία</th>
                            <th>Όνομα Προϊόντος</th>
                            <th>Απόθεμα</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>    
                        <tr>                
                            <td>Βούτυρα Κλασσικά</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: green; font-weight:bold">75</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <tr>                
                            <td>Βούτυρα Φρέσκα</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: green; font-weight:bold">75</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Γάλακτος</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">3</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα με Άρωμα</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: orange; font-weight:bold">34</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Αιγοπρόβεια</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: green; font-weight:bold">22</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Με Γεύσεις</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">9</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Σπέσιαλ</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">14</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Γάλακτος</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">3</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα με Άρωμα</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: orange; font-weight:bold">34</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Αιγοπρόβεια</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: green; font-weight:bold">22</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Με Γεύσεις</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">9</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Σπέσιαλ</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">14</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Γάλακτος</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">3</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα με Άρωμα</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: orange; font-weight:bold">34</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Αιγοπρόβεια</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: green; font-weight:bold">22</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Με Γεύσεις</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">9</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Σπέσιαλ</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">14</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Γάλακτος</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">3</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα με Άρωμα</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: orange; font-weight:bold">34</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Αιγοπρόβεια</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: green; font-weight:bold">22</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Με Γεύσεις</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">9</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Σπέσιαλ</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">14</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Γάλακτος</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">3</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα με Άρωμα</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: orange; font-weight:bold">34</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Αιγοπρόβεια</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: green; font-weight:bold">22</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Με Γεύσεις</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">9</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                        <tr>                
                            <td>Βούτυρα Σπέσιαλ</td>
                            <td>Βούτυρο Τεστ</td>
                            <td style="color: red; font-weight:bold">14</td>
                            <td><a data-toggle="modal" data-target="#editProduct" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Δημιουργία Προϊόντος</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Τίτλος Προϊόντος</label>
                        <input type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Περιγραφή Προϊόντος</label>
                        <textarea type="text" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Τιμή Προϊόντος</label>
                        <input type="number" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Απόθεμα Προϊόντος</label>
                        <input type="number" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Δημιουργία</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Επεξεργασία Προϊόντος</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Τίτλος Προϊόντος</label>
                        <input type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Περιγραφή Προϊόντος</label>
                        <textarea type="text" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Τιμή Προϊόντος</label>
                        <input type="number" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Απόθεμα Προϊόντος</label>
                        <input type="number" class="form-control" autocomplete="off">
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
@endsection