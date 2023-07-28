@extends('layout.app')

@section('content')
    <div class="mx-40">
        <livewire:navbar />
        <livewire:event-list />
        <livewire:add-participant />
        <livewire:participant-list />
    </div>
@endsection
