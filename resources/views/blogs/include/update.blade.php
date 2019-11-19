@auth
    @if(Auth::user()->isAdmin === 1)
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update">Update News</button>
        <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateLabel">Update News</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/blog/{!! $blog->id !!}" id="update" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" value="{!! $blog->title !!}" name="title" placeholder="Title" class="form-control">
                            </div>

                            <div class="form-group">
                                    <textarea name="body" placeholder="Body" class="form-control">
                                        {!! $blog->body !!}
                                    </textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" value="{!! $blog->video !!}" name="video" placeholder="Video" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" value="{!! $blog->producer !!}" name="producer" placeholder="Producer" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" value="{!! $blog->tagList !!}" name="blog_tag" placeholder="Tags" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="file" name="pics" placeholder="Image" class="form-control">
                                @if(!empty($blog))
                                    <img src="/storage/blog/thumbnail/{!! $blog->pics !!}" alt="{!! $blog->title !!}">
                                @endif
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-window-close"></i></button>
                            <button type="submit" class="btn btn-primary">Update <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endauth
