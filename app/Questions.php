<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    /** @var string */
    protected $table = 'questions';

    protected $fillable = [
        'user_id',
        'answer',
        'question'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
