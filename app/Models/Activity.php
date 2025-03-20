<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeVisible(Builder $query): void
    {
        $query->where('hidden', false);
    }

    public function completions(): int
    {
        return ActivityHistory::where('activity_id', $this->id)->count();
    }
}
