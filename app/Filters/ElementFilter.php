<?php

namespace App\Filters;

class ElementFilter extends QueryFilter
{
    public function category_id($id = null)
    {
        if ($id !== 'all') {
            return $this->builder->whereHas('categories', function ($query) use ($id) {
                $query->where('id', $id);
            });
        }
    }

    public function color_id($id = null)
    {
        if ($id !== 'all') {
            return $this->builder->whereHas('colors', function ($query) use ($id) {
                $query->where('id', $id);
            });
        }
    }

    public function price_min($id = null)
    {
        if ($id !== null) {
            return $this->builder->where('price', '>=', $id);
        }
    }

    public function price_max($id = null)
    {
        if ($id !== null) {
            return $this->builder->where('price', '<=', $id);
        }
    }
}
