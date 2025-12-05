<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBankInfo extends Model
{
    protected $table = 'user_bank_infos';
    protected $fillable = [
        'user_id',
        'bank_code',
        'bank_name',
        'account_number',
        'account_holder',
        'type',
        'email',
        'phone',
        'note',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
