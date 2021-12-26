<?php

namespace App\Filters;

class BouquetFilter extends QueryFilter{
    public function category_id($id = null){
        if($id !== 'all'){
            return $this->builder->whereHas('bouquetcategories', function($query) use($id){
                $query->where('id', $id);
            });
        }
    }
    public function element_id($id = null){
        if($id !== 'all'){
            return $this->builder->whereHas('elements', function($query) use($id){
                $query->where('id', $id);
            });
        }
    }
    public function color_id($id = null){
        if($id !== 'all'){
            return $this->builder->whereHas('colors', function($query) use($id){
                $query->where('id', $id);
            });
        }
    }
    public function event_id($id = null){
        if($id !== 'all'){
            return $this->builder->whereHas('events', function($query) use($id){
                $query->where('id', $id);
            });
        }
    }

    public function price_min($id = null){
        if($id !== null){
            return $this->builder->where('price', '>=', $id);
        }
    }
    public function price_max($id = null){
        if($id !== null){
            return $this->builder->where('price', '<=', $id);
        }
    }
}
