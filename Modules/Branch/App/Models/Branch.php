<?php

namespace Modules\Branch\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Provider\App\Models\Provider;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'branch_name',
        'branch_location',
        'phone',
        'social_media_links',
        'provider_id',
    ];

    protected $casts = [
        'social_media_links' => 'array',
    ];

    /**
     * Define the inverse one-to-many relationship with Provider model.
     */
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    /************************ Mutators And Accessors************************************/
    public function setSocial_media_linksAttribute($value)
    {
        $links = [];

        foreach ($value as $array_item) {
            if (! is_null($array_item['key'])) {
                $links[] = $array_item;
            }
        }

        $this->attributes['social_media_links'] = json_encode($links);
    }
}
