<?php

class Order extends Eloquent {

	protected $table = 'orders';

	public function user()
	{
		return $this->belongsTo('User');
	}	

	public function product()
	{
		return $this->belongsTo('Product');
	}

	public function productDetail()
	{
		return $this->belongsTo('ProductDetail');
	}

	public function getCost()
	{
		return ($this->product_detail != null) ? $this->productDetail->cost : $this->cost;
	}

	public function getDescription()
	{
		return ($this->description != null || $this->product == null) ? $this->description : $this->product->name;
	}

	public static function createReference()
	{
		$ref = strtoupper(Str::random(5));

		while (Order::where('reference', '=', $ref)->count() > 0)
			$ref = strtoupper(Str::random(5));

		return $ref;
	}

	static function boot()
	{
		parent::boot();

		Order::creating(function($order)
		{
			$order->reference = Order::createReference();
		});
	}

}
