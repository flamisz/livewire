<?php

namespace Tests\Browser\Security;

use Livewire\Component as BaseComponent;

class NestedComponent extends BaseComponent
{
    public $middleware = [];

    public function render()
    {
        $this->middleware = app('router')->current()->gatherMiddleware();

        return <<<'HTML'
<div>
    <span dusk="nested-middleware">@json($middleware)</span>
    <span dusk="nested-url">{{ \Livewire\Livewire::isLivewireRequest() ? request('fingerprint')['url'] : '' }}</span>

    <button wire:click="$refresh" dusk="refreshNested">Refresh</button>
</div>
HTML;
    }
}
