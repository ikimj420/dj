@auth
    @if(Auth::user()->isAdmin === 1)
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update">Update Album</button>
        <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateLabel">Update Album</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/album/{!! $album->id !!}" id="update" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" value="{!! $album->title !!}" name="title" placeholder="Title" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="date" value="{!! $album->date !!}" name="date" placeholder="Date" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" value="{!! $album->tagList !!}" name="album_tag" placeholder="Tags" class="form-control">
                            </div>

                            <div class="form-group">
                                    <textarea name="desc" placeholder="desc" class="form-control">
                                        {!! $album->desc !!}
                                    </textarea>
                            </div>

                            <div class="form-group">
                                <input type="file" value="{!! $album->pics !!}" name="pics" placeholder="Image" class="form-control">
                                @if(!empty($album))
                                    <img src="/storage/album/thumbnail/{!! $album->pics !!}" alt="{!! $album->title !!}">
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

