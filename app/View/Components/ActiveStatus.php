<?php

namespace App\View\Components;

use App\Enums\ActiveStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class ActiveStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public null|Model $model;
    public array $activeStatus = [];
    public string $type = 'create';

    public function __construct($type, $model = null)
    {
        $this->activeStatus = ActiveStatusEnum::toArray();
        $this->model = $model;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public
    function render()
    {
        return view('components.active-status');
    }
}
