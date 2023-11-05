<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Utils\Sortable;
use Livewire\Component;

class UserList extends Component
{
    use Sortable;
    public array $filterable;
    public array $sortable;
    public string $search = '';
    /** @var array<array<string>> */
    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];
    /**
     * init data in livewire mount
     */
    public function mount()
    {
        $this->filterable = User::FILTERABLE ?? [];
        $this->sortable = User::SORTABLE ?? [];
    }
    /**
     * livewire render fnc
     */
    public function render()
    {
        // $users = User::paginate(10);
        $query = User::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $users = $query->paginate(10);
        return view('livewire.user.user-list', compact('users'));
    }
}
