<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int id
 *
 * @property string name
 *
 * @property string status
 */
class Genre extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_BLOCKED = 'blocked';

    protected $fillable = [
        'name',
        'status',
    ];

    /*
     * Relations
    */

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /*
    * Scopes
    */

    public function scopeActive(Builder $query): Builder
    {
        return $query->whereStatus(self::STATUS_ACTIVE);
    }
}