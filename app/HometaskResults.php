<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HometaskResults
 * @package App
 * @property $user_id
 */
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
