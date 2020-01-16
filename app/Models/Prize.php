<?php

namespace App\Models;

use App\Models\Interfaces\ToBuy;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Prize
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prize whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prize extends Model implements ToBuy
{
    protected $fillable = ['name','image','code'];

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
