<?php
namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Video;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(1);
        $video = Video::latest()->paginate(9);
        $albums = Album::latest()->paginate(9);
        return view('users.index', compact('user', 'video', 'albums'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //save
        $folder = 'user';
        $img_request = $request->hasFile('pics');
        //check for picture
        if(Request()->hasFile('pics')){
            $img = Request()->file('pics');
            if($user->pics != 'default.svg'){
                // Delete Image
                Storage::delete('public/'. $folder .'/'.$user->pics);
                Storage::delete('public/'. $folder .'/thumbnail/'.$user->pics);
            }
            $picture = $this->updateImage($img_request, $img, $folder);
            $user->pics = $picture;
        }
        //update blog
        $user->update($this->validateRequest());
        return redirect(route('users.index'))->with('success','User Updated Successfully!');
    }
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'bio' => 'required',
            'song' => 'sometimes',
            'address' => 'sometimes',
            'phones' => 'sometimes',
            'findMe' => 'sometimes',
        ]);
    }
}
