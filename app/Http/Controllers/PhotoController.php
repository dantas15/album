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
    $photos = Photo::all();
    return view('/pages/photo_list', ['photos' => $photos]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('/pages/photo_form');
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

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
      $nomeFoto = sha1(uniqid(date('HisYmd')));

      $extensao = $request->photo->extension();

      $nomeArquivo = "${nomeFoto}.${extensao}";

      $upload = $request->photo->move(public_path('/storage/photos'), $nomeArquivo);

      $photo->photo_url = $nomeArquivo;
    }

    if ($upload) {
      $photo->save();
    }

    $photo->save();

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
    $photo->photo_url = "teste";

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
    Photo::findOrFail($id)->delete();

    return redirect('/photos');
  }
}
