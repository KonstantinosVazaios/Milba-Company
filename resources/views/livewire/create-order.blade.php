<div class="card border shadow-lg">
    <div class="card-body">
        <form wire:submit.prevent="submit">
            <select name="selectedWatersport" wire:model="selectedWatersport" class="form-control form-control-lg mb-4">
                <option selected>Επιλέξτε Watersport</option>
                @foreach($watersports as $watersport)
                <option value="{{$watersport->id}}">{{$watersport->title}}</option>
                @endforeach
            </select>
            @if (!is_null($selectedWatersport))
            <select name="selectedPrice" wire:model="selectedPrice" class="form-control form-control-lg mb-4 mt-4">
                <option selected>Επιλέξτε Τιμή/Χρόνο</option>
                @foreach($prices as $price)
                <option value="{{$price->id}}">{{$price->duration}} / {{$price->price}}€</option>
                @endforeach
            </select>
            @endif
            @if (!is_null($selectedPrice))
            <select name="selectedPaymentMethod" wire:model="selectedPaymentMethod" name="payment_method" class="form-control form-control-lg mb-4 mt-4">
                <option selected>ΤΡΟΠΟΣ ΠΛΗΡΩΜΗΣ</option>
                <option value="CASH">ΜΕΤΡΗΤΑ</option>
                <option value="CARD">ΚΑΡΤΑ</option>
            </select>
            @endif
            <button type="submit" class="btn btn-success mt-3">Δημιουργία Order</button>
        </form>
    </div>
</div>