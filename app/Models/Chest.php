<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chest
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chest extends Model
{
    protected $fillable = ['name','image','price'];
}
