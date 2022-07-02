<div>
    @foreach ($users as $user)
        @livewire('user-profile',['user'=>$user] , key=($user->id))
    @endforeach
    <div>
        @foreach ($users as $user)
            <livewire:user-profile :user="$user" :key="$user->id">
        @endforeach
    </div>
</div>
