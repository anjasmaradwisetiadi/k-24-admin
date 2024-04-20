<?php

namespace App\Models;

use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = []; 
    protected $keyType = 'string';
    public $incrementing = false;

    public function scopeFilter($query,$filters){
        $query->when($filters ?? false, function($query, $user){
            return  $query->where('name', 'like', '%'.$user.'%')
                        ->orWhere('email', 'like', '%'.$user.'%');
        });
    }

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
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function rolePermision($permission){
            $userRole = $this->role_id;
            $roleGet = Role::where('id','=',$userRole)->firstOrFail();
            $rolePermision = json_decode($roleGet->permisions);
            $result = false;
            for ($x = 0; $x < count($rolePermision); $x++) {
                if ($rolePermision[$x] === $permission){
                    $result = true;
                } 
            }
            return $result;
    }
}
