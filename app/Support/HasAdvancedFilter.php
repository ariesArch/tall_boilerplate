<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Validation\ValidationException;

trait HasAdvancedFilter
{
    /**
     * @param mixed $query
     * @param mixed $data
     *
     * @return mixed
     */
    public function scopeAdvancedFilter($query, $data)
    {
        return $this->processQuery($query, $data);
    }

    /**
     * @param mixed $query
     * @param mixed $data
     *
     * @return mixed
     */
    public function processQuery($query, $data)
    {
        $data = $this->processGlobalSearchFilter($data);
        $v = validator()->make($data, [
            's'    => 'sometimes|nullable|string',
            'order_column'  => 'sometimes|required|in:' . $this->sortableColumns(),
            'order_direction'   => 'sometimes|required|in:asc,desc',

            'search_match' => 'sometimes|required|in:and,or',
            'search'            => 'sometimes|required|array',
            'search.*.column'   => 'sometimes|nullable|in:' . $this->searchableColumns(),
            'search.*.search_operator' => 'required_with:search.*.column|in:' . $this->allowedOperators(),
            'search.*.search_query'  => 'nullable',

            'filter_match' => 'sometimes|required|in:and,or',
            'filter'            => 'sometimes|nullable|array',
            'filter.*.column'   => 'sometimes|nullable|in:' . $this->filterableColumns(),
            'filter.*.filter_operator' => 'nullable|in:' . $this->allowedOperators(),
            'filter.*.filter_query'  => 'nullable',

        ]);
        if ($v->fails()) {
            return throw new ValidationException($v);
        }
        $data = $v->validate();
        return (new FilterQueryBuilder())->apply($query, $data);
    }
    /** @return string */
    protected function searchableColumns()
    {
        return implode(',', $this->searchable);
    }
    /** @return string */
    protected function sortableColumns()
    {
        return implode(',', $this->sortable);
    }
    /** @return string */
    protected function filterableColumns()
    {
        return implode(',', array_keys($this->filterable));
    }
    /** @return string */
    protected function allowedOperators()
    {
        return implode(',', [
            'contains',
            'equal'
        ]);
    }
    /**
     * @param mixed $data
     *
     * @return mixed
     */
    protected function processGlobalSearchFilter($data)
    {
        if (isset($data['s'])) {
            $data['search_match'] = 'or';
            $data['search'] = array_map(function ($column) use ($data) {
                return [
                    'column' => $column,
                    'search_operator' => 'contains',
                    'search_query' => $data['s']
                ];
            }, $this->searchable);
        }
        if (isset($data['f'])) {
            $data['filter_match'] = 'and';
            $data['filter'] = [];
            foreach ($data['f'] as $key => $value) {
                if ($value) {
                    array_push($data['filter'], ['column' => $key, 'filter_operator' => 'equal', 'filter_query' => $value]);
                }
            }
        }
        return $data;
    }
}
