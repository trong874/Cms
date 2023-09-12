<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class PostImage extends Component {
    public function render() {
        page_title('Post Image');
        return view('theme::pages.post-image');
    }
}