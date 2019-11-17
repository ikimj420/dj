@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <p>{{ $error }}</p>
        </div> <!-- end error -->
    @endforeach
@endif
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
        <p>{{ $message }}</p>
    </div> <!-- end success -->
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible">
        <p>{{ $message }}</p>
    </div> <!-- end error -->
@endif
