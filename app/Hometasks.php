<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hometasks extends Model
{
    /** @var string */
    protected $table = 'hometasks';

    protected $fillable = [
        'lesson_id',
        'text'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo('App\Lessons', 'lesson_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function results()
    {
        return $this->hasMany('App\HometaskResults', 'task_id');
    }
}
