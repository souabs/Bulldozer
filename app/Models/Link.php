<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 21:46:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Link
 * 
 * @property int $id
 * @property string $original_link
 * @property string $short_link
 * @property int $users_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $link_logs
 *
 * @package App\Models
 */
class Link extends Eloquent
{
	protected $table = 'link';

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'original_link',
		'short_link',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'users_id');
	}

	public function link_logs()
	{
		return $this->hasMany(\App\Models\LinkLog::class);
	}

	
}
