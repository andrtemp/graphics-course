<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestQuestions
 * @package App
 * @method static create($data)
 * @method static find($id)
 */
class TestQuestions extends Model
{
    /** @var string */
    protected $table = 'test_questions';

    protected $fillable = [
        'question',
        'answer',
        'lesson_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo('App\Lessons', 'lesson_id', 'id');
    }
}
