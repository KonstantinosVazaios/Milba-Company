@extends('layouts.admin')

@section('styles')
<link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('title')
ΠΑΡΑΓΓΕΛΙΕΣ
@endsection

@section('content')
<livewire:orders /> 
@endsection

@section('scripts')
@endsection
