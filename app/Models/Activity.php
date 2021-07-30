<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table ='activities';
    protected $fillable = [
        'id_user', 'day_date','start', 'finish','ot', 'project_no','location', 'cek'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
