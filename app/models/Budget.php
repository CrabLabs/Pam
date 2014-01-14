<?php

class Budget extends Eloquent {

	protected $table = 'budgets';

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
		return $this->cost;
	}

	public function getDescription()
	{
		return ($this->description != null || $this->product == null) ? $this->description : $this->product->name;
	}

}
