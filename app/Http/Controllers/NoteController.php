<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Userdevice;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        $userdevices = Userdevice::all();


        return view('notes', compact('notes', 'userdevices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userdevices = Userdevice::all();

        return view('notes.create', compact('userdevices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'userdevice_id' => 'required',
            'reason' => 'required',
            'description' => 'required',
        ]);

        $notes = Note::create([
            'userdevice_id' => $request->userdevice_id,
            'reason' => $request->reason,
            'description' => $request->description,
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userdevices = Userdevice::all();
        $note = Note::find($id);
        return view('notes.edit', compact('note', 'userdevices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'userdevice_id' => 'required',
            'reason' => 'required',
            'description' => 'required',
        ]);

        $note = Note::find($id);

        $note->userdevice_id = $request->userdevice_id;
        $note->reason = $request->reason;
        $note->description = $request->description;

        $note->update();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        
        $note->delete();

        return $this->index();
    }
}
