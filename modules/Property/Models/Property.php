<?php

declare(strict_types=1);

namespace Modules\Property\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasTableFilterTrait;
use App\Traits\HasTranslationsTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Settings\Models\City;
use Modules\Settings\Models\Zone;
use Modules\Settings\Models\Currency;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Builder;
use Modules\Frontend\Requests\PropertyFilterRequest;
use Illuminate\Database\Eloquent\Attributes\Scope;

final class Property extends Model
{
    use SoftDeletes;
    use HasTableFilterTrait;
    use HasTranslationsTrait;
    use HasSlug;


    protected $fillable = [
        'property_type_id',
        'property_status_id',
        'zone_id',
        'city_id',
        'user_id',
        'currency_id',
        'title',
        'slug',
        'longitude',
        'latitude',
        'address',
        'for_sale',
        'price',
        'price_per_month',
        'for_rent',
        'views',
        'is_featured',
        'is_active',
        'bedrooms',
        'bathrooms',
        'floor',
        'garages',
        'area',
        'total_area',
        'net_area',
        'elevator',
        'logo',
        'image',
        'hover_image',
        'gallery',
        'description',
    ];

    protected array $translatable = [
        'title',
        'description'
    ];

    public $casts = [
        'gallery' => 'json',
    ];

    #[Scope]
    public function filter(Builder $query, PropertyFilterRequest $request)
    {
        return $query->whereIsActive(true)
            ->when($request->keyword, fn (Builder $query) => $query->where('title', 'like', '%' . $request->keyword . '%'))
            ->when($request->type, fn (Builder $query) => $query->wherePropertyTypeId($request->type))
            ->when($request->property_status, fn (Builder $query) => $query->wherePropertyStatusId($request->property_status))
            ->when($request->zone, fn (Builder $query) => $query->whereZoneId($request->zone))
            ->when($request->city_id, fn (Builder $query) => $query->whereCityId($request->city_id))
            ->when($request->bedrooms, fn (Builder $query) => $query->whereBedrooms($request->bedrooms))
            ->when($request->bathrooms, fn (Builder $query) => $query->whereBathrooms($request->bathrooms))
            ->when($request->price_range, fn (Builder $query) => $query->whereIn('price', explode(',', $request->price_range)))
            ->when($request->area_range, fn (Builder $query) => $query->whereIn('area', explode(',', $request->area_range)))
            ->when($request->sortby, function (Builder $query) use ($request) {
                if ($request->sortby == 'price_asc') {
                    return $query->orderBy('price', 'asc');
                } elseif ($request->sortby == 'price_desc') {
                    return $query->orderBy('price', 'desc');
                }else {
                    return $query->orderBy('id', 'desc');
                }
            });
    }

    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function propertyStatus(): BelongsTo
    {
        return $this->belongsTo(PropertyStatus::class);
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function propertyAttributes(): HasMany
    {
        return $this->hasMany(PropertyAttribute::class, 'property_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

}

