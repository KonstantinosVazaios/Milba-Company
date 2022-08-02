<div>
    <hr/>
    <h4>ACTIVITIES</h4>
    <hr/>
    <div class="row row-cols-1 row-cols-md-3 mt-4">
        @foreach($watersports as $sport)
        <div class="col mb-4">
            <div wire:click="selectSport( {{$sport->id}} )" style="cursor: pointer" class="card shadow {{$sport->id == $selectedWatersport->id ? 'border-primary' : ''}}">
            <div class="card-body">
                <h2 class="card-title {{$sport->id == $selectedWatersport->id ? 'text-primary' : ''}}">{{$sport->title}}</h2>
                <p class="card-text {{$sport->id == $selectedWatersport->id ? 'text-primary' : ''}}">{{$sport->prices->count()}} Πακέτα</p>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <hr/>
    <h4>ΠΑΚΕΤΑ</h4>
    <hr/>
    <div class="row row-cols-1 row-cols-md-3 mt-5">
        @foreach($prices as $price)
        <div class="col mb-4">
            <div wire:click="selectPrice( {{$price->id}} )" style="cursor: pointer" class="card shadow {{$price->id == $selectedPrice->id ? 'border-primary' : ''}}">
            <div class="card-body">
                <h2 class="card-title pb-1 {{$price->id == $selectedPrice->id ? 'text-primary' : ''}}">{{$price->price}}€</h2>
                <h5 class="card-text {{$price->id == $selectedPrice->id ? 'text-primary' : ''}}">{{$price->duration}}</h5>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <hr/>
    <h4>ΤΡΟΠΟΣ ΠΛΗΡΩΜΗΣ</h4>
    <hr/>
    <div class="row row-cols-1 row-cols-md-3 mt-5">
        <div class="col mb-4">
            <div wire:click="selectPaymentMethod( 'CASH' )" style="cursor: pointer" class="card shadow {{$selectedPaymentMethod == 'CASH' ? 'border-primary' : ''}}">
            <div class="card-body">
                <h2 class="card-text {{$selectedPaymentMethod == 'CASH' ? 'text-primary' : ''}}">ΜΕΤΡΗΤΑ</h2>
            </div>
            </div>
        </div>
        <div class="col mb-4">
            <div wire:click="selectPaymentMethod( 'CARD' )" style="cursor: pointer" class="card shadow {{$selectedPaymentMethod == 'CARD' ? 'border-primary' : ''}}">
            <div class="card-body">
                <h2 class="card-text {{$selectedPaymentMethod == 'CARD' ? 'text-primary' : ''}}">ΚΑΡΤΑ</h2>
            </div>
            </div>
        </div>
    </div>
    <hr/>
    <hr/>
    <div class="my-5">
        @if ($selectedWatersport->billed_individually)
        <div class="input-group input-group-lg mb-5">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">{{$selectedWatersport->billed_individually}}</span>
            </div>
            <input wire:model="pcs" type="text" class="form-control">
        </div>
        @endif
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text">Τιμή</span>
            </div>
            <input wire:model="finalPrice" type="number" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text">€</span>
            </div>
        </div>
    </div>
    <button wire:click="submit" type="submit" class="btn btn-success mt-3 w-100">Δημιουργία Παραγγελίας</button>
</div>