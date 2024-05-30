<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CWalletHistory extends Model
{
    use HasFactory;
    protected $table = 'cwallet_history';
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function userBy(){
        return $this->belongsTo(User::class, 'user_by');
    }
}
