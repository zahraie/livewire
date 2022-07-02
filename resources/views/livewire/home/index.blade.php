<div>
    <div class="row">

        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <h1>افزودن مقاله</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form wire:submit.prevent="BlogForm" onctype="multipart/form-data" >
                <div class="form-group">
                    <input wire:model.lazy="blog.title" class="form-control" type="text" placeholder="عنوان مقاله">
                </div>
                <div class="form-group">
                    <input wire:model.lazy="blog.link" class="form-control" type="text" placeholder="لینک مقاله">
                </div>
                <div class="form-group">
                    <textarea class="form-control" wire:model.lazy="blog.body" type="text" placeholder="متن مقاله"></textarea>
                </div>
                <div class="form-group">
                    <label>فعال کردن وضعیت مقاله</label>
                    <input class="form-check-input" wire:model.lazy="blog.status"  type="checkbox" value="" placeholder="فعال کردن وضعیت مقاله">
                </div>
                <div class="form-group">
                    <lable>تصویر مقاله</lable>
                    <input type="file" wire:model.lazy="img" name="img" class="form-control" placeholder="تصویر مقاله">
                    <div wire:loading wire:target="img">در حال آپلود ...</div>
                    <div wire:ignore class="progress mt-3" id="progressbar" style="display: none">
                        <div class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                    </div>
                    @if($img)
                        <img width="400" src="{{$img->temporaryUrl()}}" alt="">
                    @endif
                </div>

                <div class="form-group">
                    <button class="form-control btn btn-primary" value="">ثبت مقاله</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('component.initialized', (component) => {})
            Livewire.hook('element.initialized', (el, component) => {})
            Livewire.hook('element.updating', (fromEl, toEl, component) => {})
            Livewire.hook('element.updated', (el, component) => {})
            Livewire.hook('element.removed', (el, component) => {})
            Livewire.hook('message.sent', (message, component) => {})
            Livewire.hook('message.failed', (message, component) => {})
            Livewire.hook('message.received', (message, component) => {})
            Livewire.hook('message.processed', (message, component) => {})
        });
    </script>
</div>
