<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kandidat',
        'foto',
        'visi',
        'misi'
    ];
    protected $table = 'kandidat';
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public $timestamps = false;
}