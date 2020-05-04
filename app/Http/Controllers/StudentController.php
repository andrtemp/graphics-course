<?php

namespace App\Http\Controllers;

use App\HometaskResults;
use App\Hometasks;
use App\Http\Service\TestService;
use App\Lessons;
use App\Questions;
use App\TestResults;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->middleware('check.role:student');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lessons()
    {
        $id = TestResults::where('user_id', current_user()->id)->max('lesson_id');
        $lessons = Lessons::where('id', '<=', $id + 1)->get();

        return view('student.lesson.index', compact('lessons'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tasks()
    {
        $tasks = Hometasks::all();

        return view('student.task.index', compact('tasks'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function question()
    {
        $questions = Questions::all();

        return view('student.question.index', compact('questions'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lesson($id)
    {
        $lesson = Lessons::find($id);

        return view('student.lesson.view', compact('lesson'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function test($id)
    {
        $service = new TestService($id);
        $questions = $service->generateTest();

        return view('student.lesson.test', compact('questions', 'id'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function task($id)
    {
        $task = Hometasks::find($id);

        return view('student.task.form', compact('task'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function questionForm()
    {
        return view('student.question.form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function questionStore(Request $request)
    {
        $data = $request->validate([
            'question' => 'required'
        ]);

        $data['user_id'] = current_user()->id;
        Questions::create($data);

        return redirect()->route('student.question');
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveTest(Request $request, $id)
    {
        $data = $request->validate([
            'answers' => 'required'
        ]);

        $service = new TestService($id);
        $mark = $service->validateTest($data['answers']);

        /** @var TestResults|null $result */
        $result = TestResults::where('lesson_id', $id)->where('user_id', current_user()->id)->first();
        if (is_null($result)) {
            $result = new TestResults();
            $result->mark = $mark;
            $result->lesson_id = $id;
            $result->save();
        } else {
            $result->mark = $mark;
            $result->save();
        }


        return redirect()->route('student.lessons');
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveTask(Request $request, $id)
    {
        $data = $request->validate([
            'answer' => 'required'
        ]);

        $data['task_id'] = $id;
        $data['user_id'] = current_user()->id;

        $result = new HometaskResults();
        $result->fill($data);
        $result->save();

        return redirect()->route('student.tasks');
    }


}
