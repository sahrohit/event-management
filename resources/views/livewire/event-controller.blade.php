@extends('layout.app')

@section('content')
    <livewire:add-participant :event="$event" />
    <livewire:participant-list :event="$event" />
@endsection
