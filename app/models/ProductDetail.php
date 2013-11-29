<?php

class ProductDetail extends Eloquent {

	protected $table = 'products_details';

	public $timestamps = false;
	public $softDeletes = true;

	public function product()
	{
		return $this->belongsTo('Product');
	}

}
