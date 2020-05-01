<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResults extends Model
{
    /** @var string */
    protected $table = 'test_results';

    protected $fillable = [
        'lesson_id',
        'user_id',
        'answer',
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
}
