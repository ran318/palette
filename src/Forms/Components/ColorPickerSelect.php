<?php

namespace Awcodes\Palette\Forms\Components;

use Awcodes\Palette\Forms\Components\Concerns\CanStoreAsKey;
use Awcodes\Palette\Forms\Components\Concerns\HasColors;
use Closure;
use Filament\Forms\Components\Select;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Js;

class ColorPickerSelect extends Select
{
    use CanStoreAsKey;
    use HasColors;

    protected bool | Closure $isHtmlAllowed = true;

    protected bool | Closure $isNative = false;

    protected function setUp(): void
    {
        parent::setUp();

        $styles = Js::from(\Filament\Support\Facades\FilamentAsset::getStyleHref('palette-select-styles', 'awcodes/palette'));

        $this
            ->extraAttributes([
                'x-data' => '',
                'x-load-css' => '[' . $styles . ']',
            ])
            ->afterStateHydrated(function (ColorPickerSelect $component, string | array | null $state) {
                if (! $state) {
                    return;
                }

                if (is_array($state)) {
                    $component->state($state['key'] ?? null);

                    return;
                }

                $component->state($state);
            })
            ->dehydrateStateUsing(function (ColorPickerSelect $component, string | array | null $state) {
                if (! $state) {
                    return null;
                }

                if (is_string($state) && ! $this->shouldStoreAsKey()) {
                    return $component->getColors()[$state];
                }

                return $state;
            });
    }

    public function getOptions(): array
    {
        return collect($this->getColors())->sortBy('label')->mapWithKeys(function ($color) {
            return [$color['key'] => $this->getOptionView($color)];
        })->toArray();
    }

    public function getOptionView(array $color): string | Htmlable
    {
        return Blade::render('palette::forms.components.select-option', ['color' => $color]);
    }
}
