<?php

namespace App\Http\Livewire\Home;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads ;

    public $img;

    public Blog $blog;
    protected $rules =[
        'blog.title' => 'required|string',
        'blog.link' => 'nullable',
        'blog.body' => 'required|min:5',
        'blog.status' => 'required',
        'img' => 'required'
    ];

    protected $messages = [
        'blog.title.required' => 'عنوان نباید خالی باشد',
        'blog.body.required' => 'متن نباید خالی باشد',
        'blog.body.min' => 'متن نباید کمتر از 5 حرف باشد',
    ];

    public function mount()
    {
        $this->blog = new Blog();
    }

    public function BlogForm()
    {
        $new_blog = Blog::create([
            'title' => $this->blog->title,
            'link' => $this->blog->link,
            'body' => $this->blog->body,
            'status' => $this->blog->status,
        ]);

        if ($this->img) {
            $name = $this->img->getClientOriginalName();
            $dir = "images";
            $this->img->storeAs($dir, $name, 'public_html');
            $new_blog->update([
                'img' => "$dir/$name"
            ]);

        }

        $this->blog->title = '';
        $this->blog->link = '';
        $this->blog->body = '';
        $this->blog->status = false;
        $this->img = '';
        $this->emit('toast', 'success', 'مقاله شما با موفقیت ایجاد شد.');
    }


    public function render()
    {
        return view('livewire.home.index');
    }
}
