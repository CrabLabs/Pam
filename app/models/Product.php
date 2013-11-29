<?php

class Product extends Eloquent {

	protected $table = 'products';

	public $timestamps = false;

	public function details()
	{
		return $this->hasMany('ProductDetail');
	}

	static function boot()
	{
		parent::boot();

		Product::creating(function($product)
		{
			if (! isset($product->image))
				return false;
		});
	}

}
