<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;

class Sidebar extends Component
{
    public $menus = [];
    public $isOpen = [];
    
    public function mount()
    {
        $this->menus = Menu::get();

          foreach($this->menus as $key => $menuRow)
        {
            $this->isOpen[$key] = false;
        }
    }

    public function render()
    {
        return view('livewire.sidebar');
    }

    public function toggleOpen($key)
    {
        $this->isOpen[$key] = !$this->isOpen[$key];
    }
}
