<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class last_update_data extends Model
{
    use HasFactory;
    public $table = 'last_update_data';
    public $guarded = ['id'];
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'start_data',
        'end_data',
        'created_at',
        'updated_at'
    ];
}
