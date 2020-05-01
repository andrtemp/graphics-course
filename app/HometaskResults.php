<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HometaskResults extends Model
{
    /** @var string */
    protected $table = 'hometask_results';

    protected $fillable = [
        'task_id',
        'user_id',
        'answer',
        'mark'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo('App\Hometask','task_id');
    }
}
