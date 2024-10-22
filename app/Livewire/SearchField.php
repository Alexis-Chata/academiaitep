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
    public $class_label = null;

    public function mount($label, $placeholder, $model, $field, $query = '', $class_label = null)
    {
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->field = $field;
        $this->query = $query;
        $this->class_label = $class_label;
    }

    public function updatedQuery()
    {

        $string = trim($this->query);
        $string = str_replace([',', '.'], '', $string);
        $string = preg_replace('/\s+/', ' ', $string);
        $queries = explode(' ', $string);

        $modelClass = "App\\Models\\" . $this->model;
        $resultados = $modelClass::query();

        foreach ($queries as $query) {
            if (!empty($query)) {
                $resultados->where($this->field, 'LIKE', '%' . $query . '%');
            }
        }

        $resultados = $resultados->take(8)->get();

        $this->results = array_values($resultados->toArray());
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
