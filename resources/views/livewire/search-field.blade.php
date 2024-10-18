<div x-data="{
    open: false,
    selectedIndex: 0,
    selectItem(index) {
        if ($wire.results && $wire.results[index]) {
            $wire.selectItem($wire.results[index].id);
            this.open = false;
        }
    }
}" class="relative">
    <label for="{{ $field }}" class="form-label"><strong>{{ $label }}:</strong></label>
    <input type="text" wire:model.live="query" @focus="open = true" @click.away="open = false"
        @keydown.arrow-up.prevent="selectedIndex = Math.max(selectedIndex - 1, 0)"
        @keydown.arrow-down.prevent="selectedIndex = Math.min(selectedIndex + 1, {{ count($results) }} - 1)"
        @keydown.enter.prevent="selectItem(selectedIndex)" placeholder="{{ $placeholder }}" class="form-control">

    @if (!empty($results) && $query !== '')
        <ul class="list-group mt-2 position-absolute w-100 bg-white" x-show="open" style="z-index: 1000;">
            @foreach ($results as $index => $result)
                <li class="list-group-item text-sm px-2 py-1"
                    :class="{ 'active': selectedIndex === {{ $index }} }"
                    @click="selectItem({{ $index }})" @mouseover="selectedIndex = {{ $index }}">
                    {{ $result[$field] }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
