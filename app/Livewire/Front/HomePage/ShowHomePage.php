<?php

namespace App\Livewire\Front\HomePage;

use Livewire\Attributes\On;
use Livewire\Component;

class ShowHomePage extends Component
{
    public $render = 0;
    // #[On('load')]
    // protected function getListeners()
    // {
    //     return ['load' => 'a'];
    // }
    public function a($section)
    {
        if ($this->render < $section) {
            $this->render = $section;
        }
    }
    public function render()
    {
        return view('livewire.front.home-page.show-home-page');
    }
}
