<?php

namespace App\Utils;

trait Sortable
{
    public $sortBy        = 'id';
    public $sortDirection = 'desc';

    public function sortHeader($field)
    {
        \Log::info("From SortBy");
        $this->sortBy = $field;

        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
}
