<?php

namespace App\Http\Livewire\Home\User;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{

    public User $user;

    public function render()
    {
        $users = User::all();
        return view('livewire.home.user.index' , compact('users'));
    }
}
