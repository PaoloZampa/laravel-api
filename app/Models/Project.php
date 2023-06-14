<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type_id', 'repo', 'slug', 'image'];

    public static function linkGenerator($projectName){
        $repo = 'https://github.com/PaoloZampa/' . Str::slug($projectName, '-');
        return $repo;
    }

    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function technologies(): BelongsToMany {
        return $this->belongsToMany(Technology::class);
    }
}
