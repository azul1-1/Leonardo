<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\MyCustomResetPassword;


class User extends Authenticatable implements MustVerifyEmail
{
    
   /* public function sendPasswordResetNotification($token): void
{
    $url = 'https://example.com/reset-password?token='.$token;
 
    $this->notify(new ResetPasswordNotification($url));
}*/
    
    
    
    
      
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     
       public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyCustomResetPassword($token));
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}



