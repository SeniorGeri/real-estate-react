<?php

declare(strict_types=1);

namespace Modules\Settings\Models;

use App\Traits\HasTableFilterTrait;
use App\Traits\HasTranslationsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


final class Zone extends Model
{
    use SoftDeletes;
    use HasTableFilterTrait;
    use HasTranslationsTrait;

    protected $fillable = [
        'city_id',
        'name',
        'description',
    ];

    protected array $translatable = [
        'name'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
