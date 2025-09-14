<?php

declare(strict_types=1);

namespace Modules\Property\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasTableFilterTrait;
use App\Traits\HasTranslationsTrait;

final class PropertyAttribute extends Model
{
    use SoftDeletes;
    use HasTableFilterTrait;
    use HasTranslationsTrait;

    protected $fillable = [
        'property_id',
        'attribute',
        'value',
        'logo',
        'image',
        'description',
    ];

    protected array $translatable = [
        'attribute',
        'value'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
