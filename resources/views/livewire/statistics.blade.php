<div>
    <!-- <div class="row d-flex justify-content-between mb-5">
        <div class="col-md-6">
            <label for="date-input"><b>ΑΠΟ</b></label>
            <input wire:model="selectedStartDate" id="date-input" class="form-control form-control-lg" type="date" name="date" placeholder="Επιλέξτε Ημερομηνία" value="">
        </div>
        <div class="col-md-6 mt-3 mt-md-0">
            <label for="date-input"><b>ΜΕΧΡΙ</b></label>
            <input wire:model="selectedEndDate" id="date-input" class="form-control form-control-lg" type="date" name="date" placeholder="Επιλέξτε Ημερομηνία" value="">
        </div>
        <div class="col-12">
        <button wire:click="showStatisticsPerDate" class="btn btn-success w-100 mt-3">
            ΠΡΟΒΟΛΗ ΣΤΑΤΙΣΤΙΚΩΝ
        </button>
        </div>
    </div> -->

    <div class="row">
        <div style="height: 150px; font-size: 28px" class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div style="font-size: 18px" class="font-weight-bold text-success text-uppercase mb-1">
                                ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ</div>
                            <div class="h5 font-weight-bold text-gray-800 mt-3">{{$total_income}}€</div>                            
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-euro-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: 150px; font-size: 28px" class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div style="font-size: 18px" class="font-weight-bold text-success text-uppercase mb-1">
                                ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ - ΜΕΤΡΗΤΑ</div>
                            <div class="h5 font-weight-bold text-gray-800 mt-3">{{$income_cash}}€</div>                            
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: 150px; font-size: 28px" class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div style="font-size: 18px" class="font-weight-bold text-success text-uppercase mb-1">
                                ΣΥΝΟΛΙΚΑ ΕΣΟΔΑ - ΚΑΡΤΑ</div>
                            <div class="h5 font-weight-bold text-gray-800 mt-3">{{$income_credit}}€</div>                            
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($watersports as $watersport)
        <div style="height: 150px; font-size: 28px" class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div style="font-size: 18px" class="font-weight-bold text-danger text-uppercase mb-1">
                                ΕΣΟΔΑ - {{$watersport->title}}</div>
                            <div class="h5 font-weight-bold text-gray-800 mt-3">{{$watersport->orders_sum_price}}€</div>                            
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-swimmer fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
