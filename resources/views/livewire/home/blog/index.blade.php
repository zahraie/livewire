<div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="margin-top: 40px ; margin-bottom : 20px">
            <form onclick="event.preventDefault()">
                <input wire:model.debounce.500 = "search" type="text" placeholder="جستجو در وبلاگ ...">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان مقاله</th>
                    <th scope="col">لینک مقاله</th>
                    <th scope="col">توضیحات مقاله</th>
                    <th scope="col">وضعیت مقاله</th>
                    <th scope="col">علاقه مندی ها</th>
                    <th scope="col">تعداد بازدید ها</th>
                    <th scope="col">عملیات</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($blogs as $blog)
                    <tr>
                        <th scope="row">{{ $blog->id }}</th>
                        <td><a wire:click="$emit('postAdded')" href="/blog/1">{{ $blog->title }}</a></td>
                        <td>{{ $blog->link }}</td>
                        <td>{{ $blog->body }}</td>
                        <td>
                            @if($blog->status ==1)
                                 نمایش

                            @else
                                عدم نمایش
                            @endif
                        </td>
                        <td>
                            @if(auth()->user())
                                <a>
                                    @if($like = \App\Models\Like::where('user_id',auth()->user()->id)->first())
                                        @if($like->status =='1')
                                            <img wire:click="removeLike({{$like->id}})" style="cursor: pointer"
                                                 src="{{asset('img/remove.jpg')}}" width="38px">
                                        @else
                                            <img wire:click="updateLike({{$like->id}})" style="cursor: pointer"
                                                 src="{{asset('img/heart-add.png')}}" width="40px">
                                        @endif
                                    @else
                                        <img wire:click="addLike" style="cursor: pointer"
                                             src="{{asset('img/heart-add.png')}}" width="40px">
                                    @endif
                                </a>
                            @else
                                <a>
                                    <img wire:click="addLike" style="cursor: pointer" src="{{asset('img/heart-add.png')}}"
                                         width="40px">
                                </a>
                            @endif
                        </td>
                        <td>
                            <div class="form-group">{{ $blog->view }}</div>
                        </td>
                        <td>
                            <div class="form-group">
                                <button type="button" wire:click="deleteTable({{ $blog->id }})" class="form-control btn btn-danger btn-sm" value="">حذف</button>
                            </div>
                            <div class="form-group">
                                <a type="button" href="{{ route('blog.edit' , $blog) }}" class="form-control btn btn-warning btn-sm" value="">ویرایش</a>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
                {{ $blogs->links() }}
              </table>
        </div>
        <div class="col-md-3"></div>

    <script>
        window.livewire.emit('postAdded')
    </script>
</div>
