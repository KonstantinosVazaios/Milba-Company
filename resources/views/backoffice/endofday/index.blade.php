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
<script>
    window.addEventListener('showStatistics', () => {
        console.log('testssw');
        $('#statsModal').modal('show')
    })
</script>
@endsection
