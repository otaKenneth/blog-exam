<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];

	public function profileImage()
	{
		$imagePath = ($this->image) ? $this->image : 'uploads/xqBqzOy3m5Yyf2df3J3Lfx7Ckhs9cS9OxH1j3BaM.png';
		return '/storage/' . $imagePath;
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function followers()
    {
    	return $this->belongsToMany(User::class);
    }
}
