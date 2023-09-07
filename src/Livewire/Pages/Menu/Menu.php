<?php

namespace BytePlatform\Cms\Livewire\Pages\Menu;

use BytePlatform\Cms\Models\MenuLocation;
use BytePlatform\Component;

class Menu extends Component
{
    public $locationId;
    public function render()
    {
        page_title('Menu Setting');
        return view('cms::pages.menu.index', [
            'MenuLocation' => MenuLocation::all()
        ]);
    }
}
