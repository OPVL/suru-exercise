<?php

namespace App\Http\Controllers;

use App\Actions\GetLastNoteAddedTime;
use App\Events\NoteCreated;
use App\Http\Requests\StoreNote;
use App\Models\Note;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
{
    public function index(): View
    {
        $last = cache('lastNoteAdded') ?? session('lastNoteAdded');

        $last = Cache::get('lastNoteAdded') ?? Session::get('lastNoteAdded');
        // dd($last);

        $notes= Note::latest()
        ->orderBy('id', 'desc')
        ->limit(15);

        /** @var \Illuminate\Support\Collection */
        $notes = Note::factory()->count(15)->fakeDates()->make();

        return view('pages.notes-index', [
            'notes' => $notes->sortByDesc('created_at'),
            'lastAdded' => $last,
        ]);
    }

    public function store(StoreNote $request): RedirectResponse
    {
        $note = (new Note())->fill($request->validated());

        event(new NoteCreated($note));

        return back();
    }
}
