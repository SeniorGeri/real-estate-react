<?php

declare(strict_types=1);

namespace Modules\Property\Models;

use App\Traits\HasTableFilterTrait;
use App\Traits\HasTranslationsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


final class PropertyType extends Model
{
    use SoftDeletes;
    use HasTableFilterTrait;
    use HasTranslationsTrait;

    protected $fillable = [
        'type',
        'logo',
        'image',
        'description',
    ];

    protected array $translatable = [
        'type'
    ];
}
