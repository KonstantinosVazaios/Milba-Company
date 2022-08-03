<div class="card shadow mb-4">
    <div class="card-header bg-success py-3">
        <h4 class="m-0 text-white">Orders Table</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table style="color: #000; font-size: 17px" class="table table-bordered pb-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>WATERSPORT</th>
                        <th>Διάρκεια</th>
                        <th>ΚΟΣΤΟΣ</th>
                        <th>ΤΡΟΠΟΣ ΠΛΗΡΩΜΗΣ</th>
                        <th>ΗΜΕΡΟΜΗΝΙΑ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)    
                    <tr> 
                        <td>{{$order->id}}</td>               
                        <td>{{$order->sport->title}}</td>
                        <td>{{$order->duration}}</td>
                        <td>{{$order->price}}€</td>
                        <td>{{$order->payment_method == 'CASH' ? 'ΜΕΤΡΗΤΑ' : 'ΚΑΡΤΑ'}}</td>
                        <td>{{(new \Carbon\Carbon($order->created_at))->format('d/m/Y H:i')}}</td>
                        <td style="text-align: center">
                            <button wire:click="delete( {{$order->id}} )" class="btn btn-danger" >
                                <i class="fas fa-trash"></i>
                            </button>
                            <button wire:click="print( {{$order->id}} )" class="btn btn-info" >
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </div>
</div>
