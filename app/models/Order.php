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

}
