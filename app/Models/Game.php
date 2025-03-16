<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Get the load orders for the game.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<LoadOrder>
     */
    public function lists(): HasMany
    {
        return $this->hasMany(LoadOrder::class);
    }
}
