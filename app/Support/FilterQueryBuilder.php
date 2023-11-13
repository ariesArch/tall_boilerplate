<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class FilterQueryBuilder
{
    /** @var mixed */
    protected $model;

    /** @var mixed */
    protected $table;

    /**
     * @param mixed $query
     * @param mixed $data
     *
     * @return mixed
     */
    public function apply($query, $data)
    {
        \Log::info('SearchFilter: '. print_r($data,true));
        $this->model = $query->getModel();
        $this->table = $this->model->getTable();
        if (isset($data['search'])) {
            foreach ($data['search'] as $search) {
                $search['match'] = $data['search_match'] ?? 'or';
                $this->makeSearch($query, $search);
            }
        }
        if (isset($data['filter'])) {
            foreach ($data['filter'] as $filter) {
                $filter['match'] = $data['filter_match'] ?? 'and';
                $this->makeFilter($query, $filter);
            }
        }
        $this->makeOrder($query,$data);
        return $query;
    }
    /**
     * @param mixed $filter
     * @param mixed $query
     *
     * @return mixed
     */
    public function contains($search, $query)
    {
        $search['search_query'] = addslashes($search['search_query']);

        return $query->where($search['column'], 'like', '%'.$search['search_query'].'%', $search['match']);
    }
    /**
     * @param mixed $filter
     * @param mixed $query
     *
     * @return mixed
     */
    public function equal($filter, $query)
    {
        return $query->where($filter['column'], $filter['filter_query'], $filter['match']);
    }
    /**
     * @param mixed $filter
     * @param mixed $query
     *
     * @return mixed
     */
    protected function makeSearch($query, $search)
    {
        // \Log::info('Search: '. print_r($search,true));
        $search['column'] = "{$this->table}.{$search['column']}";
        $this->{Str::camel($search['search_operator'])}($search, $query);
    }
    /**
     * @param mixed $filter
     * @param mixed $query
     *
     * @return mixed
     */
    protected function makeFilter($query, $filter)
    {
        if ($this->isNestedColumn($filter['column'])) {
            \Log::info('Nested' . $filter['column']);
            [$relation, $filter['column']] = explode('.', $filter['column']);
            $callable                      = Str::camel($relation);
            $filter['match']               = 'and';

            $query->whereHas(Str::camel($callable), function ($q) use ($filter) {
                $this->{Str::camel($filter['filter_operator'])}(
                    $filter,
                    $q
                );
            });
            // $query->orWhereHas(Str::camel($callable), function ($q) use ($filter) {
            //     $this->{Str::camel($filter['filter_operator'])}(
            //         $filter,
            //         $q
            //     );
            // })->remember(10); 
        } else {
            $filter['column'] = "{$this->table}.{$filter['column']}";
            $this->{Str::camel($filter['filter_operator'])}(
                $filter,
                $query
            );
        }
    }
    /**
     * @param mixed $query
     * @param mixed $data
     *
     * @return mixed
     */
    protected function makeOrder($query, $data)
    {
        $query->orderBy($data['order_column'],$data['order_direction']);
    }
    protected function isNestedColumn($column)
    {
        return strpos($column, '.') !== false;
    }
}
