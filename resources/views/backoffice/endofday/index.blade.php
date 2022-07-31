@extends('layouts.admin')

@section('styles')
<link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('title')
ΚΛΕΙΣΙΜΟ ΗΜΕΡΑΣ
@endsection

@section('content')
<livewire:endofday /> 
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
    "columnDefs" : [{"targets":[4], "type":"date-eu"}],
    "bInfo": true
});
</script>
<script src="https://cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" crossorigin="anonymous"></script>
@endsection
