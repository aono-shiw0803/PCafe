<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhotosRequest;
use App\Photo;
use App\Shop;
use Storage;

class PhotoController extends Controller
{
    public function index(){
      $photos = Photo::orderBy('updated_at', 'desc')->get();
      return view('photos.index', ['photos'=>$photos]);
    }

    public function show(Photo $photo){
      return view('photos.show', ['photo'=>$photo]);
    }

    public function create(Photo $photo, Shop $shop){
      return view('photos.create', ['photo'=>$photo, 'shop'=>$shop]);
    }

    public function store(PhotosRequest $request, Photo $photo){
      $photo = new Photo();
      $photo->name = $request->name;
      $photo->content = $request->content;
      $photo->shop_id = $request->shop_id;
      $photo->user_id = $request->user_id;
      if($photo->file = $request->file){
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('pcafe/photos', $file, 'public');
        $photo->file = Storage::disk('s3')->url($path);
      }
      $photo->save();
      session()->flash('flash_message', '完了しました！');
      return redirect('photos/');
    }

    public function delete(Request $request){
      Photo::find($request->id)->delete();
      session()->flash('flash_message', '削除が完了しました！');
      return redirect('/photos');
    }
}
