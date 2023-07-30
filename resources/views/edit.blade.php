@extends('layout.app')

@section('content')
    <livewire:add-participant :event="$event" :participant="$participant" />
@endsection
