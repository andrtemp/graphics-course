<?php

namespace App\Http\Service;

use App\TestQuestions;

class TestService
{
    const COUNT = 5;

    /**
     * @var integer
     */
    private $lesson_id;

    /**
     * TestService constructor.
     * @param $lesson_id
     */
    public function __construct($lesson_id)
    {
        $this->lesson_id = $lesson_id;
    }

    /**
     * @param int $count
     * @return TestQuestions[]|mixed
     */
    public function generateTest($count = self::COUNT)
    {
        return TestQuestions::where('lesson_id', $this->lesson_id)->limit($count)->get();
    }

    /**
     * @param $data
     * @return int
     */
    public function validateTest($data)
    {
        $mark = 0;

        foreach ($data as $key => $value) {
            $question = TestQuestions::find($key);
            if ($question->answer === $value)
                $mark += 1;
        }

        return $mark;
    }
}