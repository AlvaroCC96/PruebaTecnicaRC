<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name',
        'extension',
        'user_id',
        'route'
    ];

    /**
     * Get the user that owns the file.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
