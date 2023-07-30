@extends('layout.app')

@section('content')
    <livewire:add-participant :event="$event" :participant="null" />
    <livewire:participant-list :event="$event" />
@endsection
