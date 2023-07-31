<?php

namespace Tests\Unit;

use function App\Http\Livewire\AddParticipant;

test('Generate PNR', function () {
    $result = AddParticipant::generatePNR();

    expect($result)->toBeString();
});