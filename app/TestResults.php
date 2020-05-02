<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestResults
 * @package App
 * @property $user_id
 * @property $lesson_id
 * @property $answer
 * @property $mark
 */
class TestResults extends Model
{
    /** @var string */
    protected $table = 'test_results';

    protected $fillable = [
        'lesson_id',
        'user_id',
        'mark'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo('App\Lessons','lesson_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = [])
    {
        $this->user_id = current_user()->id;

        return parent::save($options);
    }
}
