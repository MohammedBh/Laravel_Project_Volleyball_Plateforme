<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }
}
