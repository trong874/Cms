<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class PostCategory extends Component {
    public function render() {
        page_title('Post Category');
        return view('theme::pages.category');
    }
}