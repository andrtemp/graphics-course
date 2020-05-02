<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lessons
 * @package App
 * @method static create($data)
 * @method static find($id)
 */
class Lessons extends Model
{
    /** @var string */
    protected $table = 'lessons';

    protected $fillable = [
        'topic',
        'description',
        'video'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\TestQuestions', 'lesson_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mark()
    {
        return $this->hasOne('App\TestResults', 'lesson_id')->where('user_id', current_user()->id);
    }
}
