<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User ;

class UserProfile extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.user-profile');
    }
}
