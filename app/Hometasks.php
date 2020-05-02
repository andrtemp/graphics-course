<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hometasks
 * @package App
 * @method static create($data)
 * @method static find($id)
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mark()
    {
        return $this->hasOne('App\HometaskResults', 'task_id')->where('user_id', current_user()->id);
    }
}
