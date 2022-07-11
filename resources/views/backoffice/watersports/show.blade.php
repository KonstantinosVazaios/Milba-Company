@extends('layouts.admin')

@section('styles')
@endsection

@section('title')
{{$watersport->title}}
@endsection

@section('content')
<livewire:update-watersport :watersport="$watersport" /> 
@endsection

@section('scripts')
@endsection
