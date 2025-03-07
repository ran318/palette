<div class="palette-select-option">
    @if ($color['type'] === 'class')
        <span class="{{ $color['value'] }}" style="display: block; border-radius: 100%; width: 1rem; height: 1rem; flex-shrink: 0;"></span>
    @else
        <span style="display: block; border-radius: 100%; width: 1rem; height: 1rem; flex-shrink: 0; background-color: {{ $color['type'] === 'rgb' ? 'rgba(' . $color['value'] . ', 1)' : $color['value'] }};"></span>
    @endif
    <span style="line-height: 1; display: block; height: 1rem;">{{ $color['label'] }}</span>
</div>

@once
@push('styles')
    <style>
        .choices__inner .palette-select-option {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            line-height: 1;
            height: 1rem;
            position: absolute;
            top: calc(50% - 0.5rem);
        }

        .choices__list--dropdown .palette-select-option {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            line-height: 1;
            height: 1rem;
        }
    </style>
@endpush
@endonce
