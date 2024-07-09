<?php

namespace App\Models;

// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class profileData extends Model
{
    use HasFactory;
    
    protected $table = 'profile_data';

    public function scopeFilter(Builder $query, array $fil): void{
        $query->when(
            $fil['search'] ?? false,
            fn($query, $search) =>
            $query->where('name','like','%'.$search.'%')
            ->orWhere('school','like','%'.$search.'%')
            ->orWhere('place_birth','like','%'.$search.'%')
            ->orWhere('date_birth','like','%'.$search.'%')
            // ->orWhere(DB::raw('CAST(information AS VarChar)'),'like','%'.$search.'%')
            
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

    public function sekolah(): BelongsTo {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
