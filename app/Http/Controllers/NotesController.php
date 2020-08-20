<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotesController extends Controller
{
    public function store()
    {

        try {
            Note::create([
                'user_id' => 1,
                'note' => 'test'
            ]);
        } catch (QueryException $e) {
            if($e->getCode() == 23000) {
                return (new Response('User Does Not Exist', 500));
            }
            return (new Response('Error Occurred', 500));
        }

    }
}
