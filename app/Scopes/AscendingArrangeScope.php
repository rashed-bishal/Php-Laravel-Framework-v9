<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AscendingArrangeScope implements Scope
{
	public function apply(Builder $builder, Model $model)
	{
		$builder->orderBy('name', 'asc');
	}
}