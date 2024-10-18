<?php

namespace App\Livewire;

use Livewire\Component;

class SearchField extends Component
{
    public $label;
    public $placeholder;
    public $model;
    public $field;
    public $query = '';
    public $results = [];
    public $selectedItem = null;

    public function mount($label, $placeholder, $model, $field)
    {
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->field = $field;
    }

    public function updatedQuery()
    {
        $modelClass = "App\\Models\\" . $this->model;
        $query = $modelClass::where($this->field, 'LIKE', '%' . $this->query . '%')->take(5)->get();
        $this->results = array_values($query->toArray());
        //dd($this->results);
    }

    public function selectItem($id)
    {
        $modelClass = "App\\Models\\" . $this->model;
        $this->selectedItem = $modelClass::find($id);
        $this->query = $this->selectedItem->{$this->field};
        $this->results = [];
        $this->dispatch('itemSelected', $this->model, $this->selectedItem->id, $this->query);
    }

    public function render()
    {
        return view('livewire.search-field');
    }
}
