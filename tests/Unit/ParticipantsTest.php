<?php

use App\Http\Livewire\AddParticipant;

test('It generates correct PNR', function () {
    $pnr = AddParticipant::generatePNR();

    expect($pnr)
        ->toBeString()
        ->toHaveLength(8)
        ->not
        ->toBeNull();
});
