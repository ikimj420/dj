@auth
    @if(Auth::user()->isAdmin === 1)
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update">Update User</button>
        <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/about/{!! $user->id !!}" id="update" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" value="{!! $user->name !!}" name="name" placeholder="Full Name" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="email" value="{!! $user->email !!}" name="email" placeholder="Email" class="form-control">
                            </div>

                            <div class="form-group">
                                    <textarea name="bio" placeholder="Biography" class="form-control">
                                        {!! $user->bio !!}
                                    </textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" value="{!! $user->song !!}" name="song" placeholder="Favorite Song" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" value="{!! $user->address !!}" name="address" placeholder="Address" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" value="{!! $user->phones !!}" name="phones" placeholder="Phones" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="file" name="pics" placeholder="Image" class="form-control">
                                @if(!empty($user))
                                    <img src="/storage/user/{!! $user->pics !!}" style="width: 10%" alt="{!! $user->name !!}">
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="file" name="pics2" placeholder="Image2" class="form-control">
                                @if(!empty($user))
                                    <img src="/storage/user/{!! $user->pics2 !!}" style="width: 10%" alt="{!! $user->name !!}">
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
