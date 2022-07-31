<div class="card shadow mb-4">
    <div class="card-header bg-success py-3">
        <h4 class="m-0 text-white">ΚΛΕΙΣΙΜΑΤΑ ΗΜΕΡΑΣ</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table style="color: #000; font-size: 17px" class="table table-bordered pb-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ΑΠΟ</th>
                        <th>ΜΕΧΡΙ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terminations as $termination)
                    <tr>                
                        <td>{{$termination->id}}</td>
                        <td>{{(new \Carbon\Carbon($termination->datetime_from))->format('d/m/Y H:i')}}</td>
                        <td>{{(new \Carbon\Carbon($termination->datetime_to))->format('d/m/Y H:i')}}</td>
                        <td style="text-align: center">
                            <button wire:click="show( {{$termination->id}} )" class="btn btn-info" >
                                ΠΡΟΒΟΛΗ ΣΤΑΤΙΣΤΙΚΩΝ
                            </button>
                            <button wire:click="print( {{$termination->id}} )" class="btn btn-primary" >
                                ΕΚΤΥΠΩΣΗ ΣΤΑΤΙΣΤΙΚΩΝ
                            </button>
                            <button wire:click="delete( {{$termination->id}} )" class="btn btn-danger" >
                                ΔΙΑΓΡΑΦΗ ΓΡΑΜΜΗΣ
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>