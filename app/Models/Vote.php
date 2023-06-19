<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = ['calon_id'];

    public function kandidats()
    {
        return $this->belongsTo(Kandidat::class);
    }
}