@auth
    @if(Auth::user()->isAdmin === 1)
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addVideo">Add New Video</button>
    @endif
@endauth
<!-- Modal -->
<div class="modal fade" id="addVideo" tabindex="-1" role="dialog" aria-labelledby="addVideoNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVideoNewLabel">Add New Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ action('VideoController@store') }}" id="addVideoNew">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" name="title" placeholder="Title" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="video" placeholder="Video" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="date" name="date" placeholder="Date" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="producer" placeholder="Producer" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="video_tag" placeholder="Tags" class="form-control">
                    </div>

                    <div class="form-group">
                                    <textarea name="desc" placeholder="Description" class="form-control">
                                    </textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-window-close"></i></button>
                    <button type="submit" class="btn btn-primary">Create <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
