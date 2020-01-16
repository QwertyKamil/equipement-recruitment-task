<?php

namespace App\Models;

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
class Rune extends Model
{
    protected $fillable = ['name', 'image', 'bonus'];
}
