<?php

declare(strict_types=1);

namespace Modules\Property\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasTableFilterTrait;
use App\Traits\HasTranslationsTrait;

final class PropertyStatus extends Model
{
    use SoftDeletes;
    use HasTableFilterTrait;
    use HasTranslationsTrait;

    protected $fillable = [
        'status',
        'logo',
        'image',
        'description',
    ];

    protected array $translatable = [
        'status'
    ];
}
