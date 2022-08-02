<span>
    @if ($day_has_started)
    <button class="btn btn-warning font-weight-bold ml-2" data-toggle="modal" data-target="#endOfDay">ΚΛΕΙΣΙΜΟ ΗΜΕΡΑΣ</button>
    @else
    <button class="btn btn-success font-weight-bold ml-2" data-toggle="modal" data-target="#startOfDay">ΞΕΚΙΝΗΜΑ ΗΜΕΡΑΣ</button>
    @endif

    <div class="modal fade" id="endOfDay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ΠΡΟΣΟΧΗ! ΚΛΕΙΣΙΜΟ ΗΜΕΡΑΣ...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Προσοχή, είστε σίγουρος ότι θέλετε να πραγματοποιήσετε ΚΛΕΙΣΙΜΟ ΗΜΕΡΑΣ
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ακύρωση</button>
                    <button type="button" class="btn btn-danger" wire:click="endDay">Κλείσιμο Ημέρας</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="startOfDay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ΞΕΚΙΝΗΜΑ ΗΜΕΡΑΣ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Προσοχή, είστε σίγουρος ότι θέλετε να πραγματοποιήσετε ΞΕΚΙΝΗΜΑ ΗΜΕΡΑΣ
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ακύρωση</button>
                    <button type="button" class="btn btn-success" wire:click="startDay">ΞΕΚΙΝΗΜΑ ΗΜΕΡΑΣ</button>
                </div>
            </div>
        </div>
    </div>
</span>