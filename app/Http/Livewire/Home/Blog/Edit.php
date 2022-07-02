<?php

namespace App\Http\Livewire\Home\Blog;

use App\Models\Blog;
//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    //use AuthorizesRequests ;
    use WithFileUploads ;
    public $img ;

    public Blog $blog;
    protected $rules =[
        'blog.title' => 'required|string',
        'blog.link' => 'nullable',
        'blog.body' => 'required|min:5',
        'blog.status' => 'required',
        'img' => 'nullable'
    ];

    protected $messages = [
        'blog.title.required' => 'عنوان نباید خالی باشد',
        'blog.body.required' => 'متن نباید خالی باشد',
        'blog.body.min' => 'متن نباید کمتر از 5 حرف باشد',
    ];


    public function BlogForm()
    {
        //$this->authorize('update',$this->blog);
        $new_blog = $this->blog->update([
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
        alert()->success('آپدیت مقاله', 'مقاله با موفقیت آپدیت شد.');
        return $this->redirect('/all');

        //حالت های مختلف ریدایرکت کردن در لایو وایر
        //return $this->redirect('/all');
        //return redirect('/all');
        //return redirect(route'all');
        //return redirect()->to('/all');
        //return redirect()->route('/all');
    }

    public function render()
    {
        $blog = $this->blog;
        return view('livewire.home.blog.edit',compact('blog'));
    }
}
