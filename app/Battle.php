<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    public static $rules = [
        'user_id' => 'required|integer|exists:users,id',
        'score' => 'required|numeric'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'game_id', 'user_id', 'score'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * @var string
     */
    protected $table = 'battles';

    /**
     * @var string
     */
    public $primaryKey = 'id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\user', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function games()
    {
        return $this->hasOne('App\game', 'id', 'game_id');
    }
}
