<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\NoteCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class UpdateLastAdded
{
    public function handle(NoteCreated $event): void
    {
        Log::info($event->note->content);

        cache(['lastNoteAdded', $event->note->createdAt ?? Carbon::now()]);
        session(['lastNoteAdded', $event->note->createdAt ?? Carbon::now()]);

        $last = Cache::get('lastNoteAdded') ?? Session::get('lastNoteAdded');

        Cache::put('lastNodeAdded', $event->note->createdAt ?? Carbon::now(), 32400);
        Session::put('lastNodeAdded', $event->note->createdAt ?? Carbon::now());
    }
}
