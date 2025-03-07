<span style="display: flex; gap: 0.5rem; align-items: center; line-height: 1;">
    @if ($color['type'] === 'class')
        <span class="{{ $color['value'] }}" style="display: inline-block; border-radius: 100%; width: 0.875rem; height: 0.875rem; flex-shrink: 0;"></span>
    @else
        <span style="display: inline-block; border-radius: 100%; width: 0.875rem; height: 0.875rem; flex-shrink: 0; background-color: {{ $color['type'] === 'rgb' ? 'rgba(' . $color['value'] . ', 1)' : $color['value'] }};"></span>
    @endif
    <span>{{ $color['label'] }}</span>
</span>
