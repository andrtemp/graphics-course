<?php

namespace App\Http\Controllers;

use App\HometaskResults;
use App\Questions;
use App\TestResults;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * TeacherController constructor.
     */
    public function __construct()
    {
        $this->middleware('check.role:teacher');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tasks()
    {
        $tasks = HometaskResults::all();

        return view('teacher.task.index', compact('tasks'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tasksShow($id)
    {
        $task = HometaskResults::find($id);

        return view('teacher.task.form', compact('task'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tasksMark(Request $request, $id)
    {
        $data = $request->validate([
            'mark' => 'required'
        ]);

        /** @var HometaskResults $task */
        $task = HometaskResults::find($id);
        $task->mark = $data['mark'];
        $task->save();

        return redirect()->route('teacher.tasks');
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function attendance()
    {
        $users = User::where('role', 'student')->get();
        $students = [];

        $hometasks = HometaskResults::all();
        $test = TestResults::all();

        foreach ($users as $user){
            $sum = $test->where('user_id', 5)->pluck('mark')->sum()
                + $hometasks->where('user_id', 5)->whereNotNull('mark')->pluck('mark')->sum();
            $students[] = (object) [
                'id' => $user->id,
                'name' => $user->name,
                'mark' => $sum
            ];
        }

        return view('teacher.attendance', compact('students'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function questions()
    {
        $questions = Questions::all();

        return view('teacher.question.index', compact('questions'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function questionsShow($id)
    {
        $question = Questions::find($id);

        return view('teacher.question.form', compact('question'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function answer(Request $request, $id)
    {
        $data = $request->validate([
            'answer' => 'required'
        ]);

        /** @var Questions $question */
        $question = Questions::find($id);
        $question->answer = $data['answer'];
        $question->save();

        return redirect()->route('teacher.questions');
    }
}
