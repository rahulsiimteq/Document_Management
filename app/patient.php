<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class patient extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MedicareNO','patientName','details','author'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
        public function MedicarNo(){
          $this->hasOne(User::class,'MedicarNo','MedicarNo');
        }

}
