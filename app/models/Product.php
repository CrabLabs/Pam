<?php

class Product extends Eloquent {

	protected $table = 'products';

	public $timestamps = false;

	public function details()
	{
		return $this->hasMany('ProductDetail');
	}

	public function getThumb()
	{
		return URL::to('img/uploads/products/thumbs/'.$this->image);
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
