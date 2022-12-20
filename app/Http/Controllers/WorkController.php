<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index() {
        $works = Work::orderBy('published')
            ->orderBy('published')->get();

        return response()->json([
            'work' => $works
        ]);
    }

    public function show(Work $works) {
        $works->load('works');
        return response()->json($works);
    }

    public function store(Request $request) {
        $request->validate([
            'genre' => 'string|required',
            'published' => 'date|required',
            'bookSold' => 'numeric|required',
            'authorsId' => 'numeric|required',
        ]);

        $work = Work::create($request->all());

        return response()->json($work);
    }

    public function update(Work $work, Request $request) {
        $work->update($request->all());

        return response()->json($work);
    }

    public function destroy(Work $work) {
        $work->delete();
        return response()->json(['message'=>'work has been deleted.']);
    }
}
