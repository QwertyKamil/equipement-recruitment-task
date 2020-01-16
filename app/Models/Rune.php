<?php

namespace App\Models;

use App\Models\Interfaces\ToBuy;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rune
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $bonus
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rune whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rune extends Model implements ToBuy
{
    protected $fillable = ['name', 'image', 'bonus'];

    private function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('id');
    }

    public function assignToUser(User $user)
    {
        $this->users()->attach($user);
    }

    public function canBuy(float $balance): bool
    {
        return true;
    }
}
