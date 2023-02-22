<?php

namespace App\Models;

use App\Http\Scopes\EnableScope;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $description
 * @property string $categoria
 * @property int $stock
 * @property int $enable
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productos';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['description', 'categoria', 'stock', 'enable', 'created_at', 'updated_at'];

    protected static function booted()
    {
        static::addGlobalScope(new EnableScope);
    }
}
