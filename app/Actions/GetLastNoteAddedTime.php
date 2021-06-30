<?php

namespace App\Actions;

use Carbon\Carbon;

class GetLastNoteAddedTime
{
    public function execute(): ?Carbon
    {
        return cache('lastAddedTime');
    }
}
