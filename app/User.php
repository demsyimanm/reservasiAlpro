<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['name', 'username', 'password','remember_token'];

    public function getAuthIdentifier()
	{
		return $this->id;
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	public function getRememberToken()
	{
		return $this->{$this->getRememberTokenName()};
	}

	public function setRememberToken($value)
	{
		$this->{$this->getRememberTokenName()} = $value;
	}
}
