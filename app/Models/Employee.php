<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companie;
class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'phone',
        'companie_id'
    ];
    public function companie(){
        return $this->belongsTo(Companie::class,'companie_id');
    }
}
