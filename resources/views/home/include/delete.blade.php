@auth
    @if(Auth::user()->isAdmin === 1)
        <form action="/home/{!! $home->id !!}" method="post" onclick="return confirm('Are you sure?')">
            @method("DELETE")
            @csrf
                <button class="btn btn-danger" type="submit"> Delete </button>
        </form>
    @endif
@endauth
