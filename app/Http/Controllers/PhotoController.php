<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando o model Photo
use App\Models\Photo;

class PhotoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $photos = Photo::all();
    return view('/pages/home', ['photos' => $photos]);
  }


  public function showAll()
  {
    $photos = Photo::all()->where('user_id', auth()->user()->id);
    return view('/pages/photo_list', ['photos' => $photos]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages/photo_form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $photo = new Photo();

    $photo->title = $request->title;
    $photo->date = $request->date;
    $photo->description = $request->description;
    $photo->user_id = auth()->user()->id;

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

      $upload = $this->uploadPhoto($request->photo);

      $directoryArray = explode(DIRECTORY_SEPARATOR, $upload);

      $photo->photo_url = end($directoryArray);
    }

    if ($directoryArray) {
      $photo->save();
    }

    return redirect('/');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $photo = Photo::findOrFail($id);
    return view('pages/photo_form', ['photo' => $photo]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $photo = Photo::findOrFail($request->id);

    $photo->title = $request->title;
    $photo->date = $request->date;
    $photo->description = $request->description;

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

      $this->deletePhoto($photo->photo_url);

      $upload = $this->uploadPhoto($request->photo);

      $directoryArray = explode(DIRECTORY_SEPARATOR, $upload);

      $photo->photo_url = end($directoryArray);

      if ($directoryArray) {
        $photo->update();
      }

      return redirect('/photos');
    }

    $photo->update();

    return redirect('/photos');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $photo = Photo::findOrFail($id);

    $this->deletePhoto($photo->photo_url);

    $photo->delete();

    return redirect('/photos');
  }

  public function uploadPhoto($photo)
  {

    $nomeFoto = sha1(uniqid(date('HisYmd')));

    $extensao = $photo->extension();


    $nomeArquivo = "{$nomeFoto}.{$extensao}";

    $upload = $photo->move(public_path("storage" . DIRECTORY_SEPARATOR . "photos"), $nomeArquivo);

    return $upload;
  }

  public function deletePhoto($filename)
  {
    if (file_exists(public_path("storage" . DIRECTORY_SEPARATOR . "photos" . DIRECTORY_SEPARATOR . $filename))) {
      unlink(public_path("storage" . DIRECTORY_SEPARATOR . "photos" . DIRECTORY_SEPARATOR . $filename));
    }
  }
}
