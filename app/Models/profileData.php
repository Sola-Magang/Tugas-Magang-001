<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class profileData extends Model
{
    use HasFactory;
    
    protected $table = 'profile_data';

    public function scopeFilter(Builder $query, array $fil): void{
        $query->when(
            $fil['search'] ?? false,
            fn($query, $search) =>
            $query->where('name','like','%'.$search.'%')
        );
        $query->when(
            $fil['category'] ?? false,
            fn($query, $cat) =>
            $query->whereHas('pos',fn($query)=>$query->where('slug',$cat))
        );
    }

    public function pos(): BelongsTo{
        return $this->belongsTo(category::class);
    }
}
