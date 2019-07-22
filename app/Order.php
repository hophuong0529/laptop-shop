<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table ='orders';
	public $timestamps = false;

	public function orderUser() {
		return $this->belongsTo(Member::class,'userId','id');
	}

}

