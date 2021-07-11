<?php

namespace App\Traits;

use App\Enums\FlashMessagesEnum;

trait LivewireHelperTrait {


    public function created()
    {
        session()->flash('message', FlashMessagesEnum::CreatedMsg);
        $this->resetInputFields();

        $this->emit('modalFadeOut');

    }


    public function updated()
    {
        session()->flash('message', FlashMessagesEnum::UpdateMsg);
        $this->resetInputFields();

        $this->emit('modalFadeOut');
    }
}
