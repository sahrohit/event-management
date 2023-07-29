@extends('layout.app')

@section('content')
    <div class="mx-40">
        <livewire:navbar />
        <livewire:add-participant :event="$event" />
        <livewire:participant-list :event="$event" />
    </div>
@endsection
