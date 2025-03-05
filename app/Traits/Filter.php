<?php
namespace App\Traits;

trait Filter
{
    public function scopeSearch($query, $search){
        return $query->when($search, function($query) use ($search) {

            $query->having(function($query) use ($search){

                foreach($this->searchQuery ?? [] as $field){
                    $query->orHaving($field, "like", "%$search%");
                }

            });

        });
    }

    public function scopeFilter($query, $filter){
        return $query->when($filter, function($query) use ($filter) {
            if(str_contains($filter, 'category')){

                $category_val = explode('_', $filter)[1];

                $query->having($this->filterCategory, $category_val);
            }else if($filter == 'order'){

            }
        });
    }
}