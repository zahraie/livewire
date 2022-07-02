<?php

namespace App\Http\Livewire\Home\Blog;

use App\Models\Blog;
use App\Models\Like;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public Blog $blog;
    public Like $like;

    use WithPagination ;
    public $search;
    public $postCount;
    protected $updatesQueryString = ['search'];
    protected $listeners = ['postAdded' => 'incrementPostCount'];
    protected $paginationTheme = 'bootstrap' ;

    public function incrementPostCount()
    {

        $blog = Blog::first();
        $this->postCount = $blog;
        $view = $blog->view;
        $blog->update([
            'view' => $view + 1
        ]);
        dd($this->postCount);
    }

    public function addLike()
    {
        $this->emit('postAdded');

        if (auth()->user()) {
            Like::create([
                'user_id' => auth()->user()->id,
                'status' => 1,
            ]);
        } else {
            return redirect('/login');
        }

    }

    public function removeLike($id)
    {
        $like = Like::find($id);
//        $like->delete();
        $like->update([
            'status' => 0
        ]);
    }

    public function updateLike($id)
    {

        $like = Like::find($id);
        $like->update([
            'status' => 1
        ]);
    }

    public function deleteTable($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
    }

    public function render()
    {
        $blogs = Blog::where('title', 'like', "%{$this->search}%")
        ->orWhere('link', 'like', "%{$this->search}%")
        ->orWhere('body', 'like', "%{$this->search}%")
        ->orWhere('id', $this->search)
        ->paginate(2);
        return view('livewire.home.blog.index',compact('blogs'));
    }
}
