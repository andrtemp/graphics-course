<?php

namespace App\Http\Controllers\Resource;

use App\Hometasks;
use App\Http\Controllers\Controller;
use App\Lessons;
use Illuminate\Http\Request;

class HomeTaskController extends Controller
{
    /**
     * HomeTaskController constructor.
     */
    public function __construct()
    {
        $this->middleware('check.role:root');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hometasks = Hometasks::all();

        return view('resource.home-task.index', compact('hometasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lessons::all(['id', 'topic']);

        return view('resource.home-task.form',compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'lesson_id' => 'required',
            'text' => 'required'
        ]);

        Hometasks::create($data);

        return redirect()->route('home-tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hometasks::find($id)->delete();

        return redirect()->route('home-tasks.index');
    }
}
