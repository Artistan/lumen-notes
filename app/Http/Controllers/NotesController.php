<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * @param Note $note
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Note $note)
    {
        $notes = $note->orderBy('id', 'asc')->paginate();

        return view('note.list', compact('notes'));
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'note' => 'required'
        ]);

        // defaults to the location input filed
        $inputs = $request->all(['title','note']);
        $inputs['user_id'] = Auth::user()->id;

        try {
            if (Note::create($inputs)) {
                // flash the message to display
                $request->session()->flash('messages', ['success' => 'Note Created']);
                // redirect
                return redirect()->route('note.index');
            }
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                // flash the message to display
                $request->session()->flash('errors', ['User Does Not Exist']);
                return redirect()->route('note.index');
            }
        }
        // flash the message to display
        $request->session()->flash('errors', ['Failed to create Note']);
        return redirect()->route('note.index');
    }

    /**
     * @param Note $note
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Note $note)
    {
        return view('note.create', compact('note'));
    }

    /**
     * @param string $note
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( $note)
    {
        $note = Note::find($note);
        return view('note.edit', compact('note'));
    }

    /**
     * @param $note
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update($note, Request $request)
    {
        $note = Note::find($note);
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required'
        ]);

        $inputs = $request->all(['title','note']);
        if ($note->update($inputs)) {
            // flash the message to display
            $request->session()->flash('messages', ['success' => 'Note Updated']);
            return redirect()->route('note.index');
        }

        // flash the message to display
        $request->session()->flash('errors', ['Failed to update Note']);
        return redirect()->route('note.index');
    }

    /**
     * @param $note
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($note)
    {
        $note = Note::find($note);
        if ($note->delete()) {
            // flash the message to display
            request()->session()->flash('messages', ['success' => 'Note Deleted']);
            return redirect()->route('note.index');
        }

        // flash the message to display
        request()->session()->flash('errors', ['Failed to delete Note']);
        return redirect()->route('note.index');
    }
}
