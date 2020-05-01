<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Lessons;
use App\TestQuestions;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * LessonController constructor.
     */
    public function __construct()
    {
        $this->middleware('check.role:root');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lessons::all();

        return view('resource.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resource.lesson.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'topic' => 'required',
            'video' => 'nullable',
            'description' => 'required'
        ]);

        Lessons::create($data);

        return redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** @var Lessons $lesson */
        $lesson = Lessons::find($id);

        return view('resource.lesson.view', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lessons::find($id)->delete();

        return redirect()->route('lessons.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testCreate($id)
    {
        $lesson_id = $id;

        return view('resource.test.form', compact('lesson_id'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function testStore(Request $request, $id)
    {
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $data['lesson_id'] = $id;

        TestQuestions::create($data);

        return redirect()->route('lessons.show', $id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function testDestroy($id)
    {
        TestQuestions::find($id)->delete();

        return redirect()->route('lessons.index');
    }
}
