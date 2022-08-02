<div>
    <div class="card border shadow-lg">
        <div class="card-body">
            <form id="update" wire:submit.prevent="submit">
                <h4 class="mt-3">Βασικά Στοιχεία Watersport</h4>
                <div class="dropdown-divider"></div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Τίτλος</label>
                    <input wire:model="title" name="title" type="text" class="form-control" value="{{$title}}">
                    @error('title') 
                    <div class="alert alert-danger mt-2" role="alert">
                    {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Αν Χρεώνεται Ατομικά (π.χ ανά άτομο, ανά jet ski) πληκτρολογήστε τον τίτλο της μονάδας μέτρησης (π.χ Άτομα ή Jet Skis)</label>
                    <input wire:model="billed_individually" name="billed_individually" type="text" class="form-control" value="{{ old('billed_individually') }}">
                    @error('billed_individually') 
                    <div class="alert alert-danger mt-2" role="alert">
                    {{$message}}
                    </div>
                    @enderror
                </div>
                
                <h4 class="mt-5">
                    ΠΑΚΕΤΑ
                </h4>
                <div class="dropdown-divider"></div>
                <div class="list-group py-3">
                    @foreach($prices as $key => $price)
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span>{{$price['duration']}} / {{$price['price']}}€</span>
                        <button wire:click="removePrice( {{$key}} )" type="button" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </li>
                    @endforeach
                </div>                
            </form>
            <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#newPriceModal">Προσθήκη Νέου Πακέτου</button>
            <button form="update" type="submit" class="btn btn-success mt-3">Αποθήκευση</button>
            <button wire:click="delete" type="submit" class="btn btn-danger mt-3">Διαγραφη</button>
        </div>
    </div>

    <div wire:ignore class="modal fade" id="newPriceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Προσθήκη Νέας Τιμής</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Χρόνος</label>
                        <input wire:model="duration" name="duration" type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Τιμή</label>
                        <input wire:model="price" name="price" type="number" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="addPrice" type="submit" class="btn btn-primary">Προσθήκη</button>
                </div>
            </div>
        </div>
    </div>
</div>
