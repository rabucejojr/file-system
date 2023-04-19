<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
  // upload file infos to db
  public function upload_file()
  {
    return view('upload');
  }
  // store/save function controller
  public function store(Request $r)
  {
    // get filename. path, and folder from upload form
    $file = $r->Filename;
    $path = $r->FilePath;
    $folder = $r->FileFolder;
    $fileInfo = [
      'Filename' => $file,
      'FileFolder' => $folder,
      'FilePath' => $path,
      'FileDescription' => trim($r->FileDescription),
    ];
    if (empty($r->Filename)) {
      return view('upload')->with('Error', 'File is required.');
    }
    if (empty($r->FileDescription)) {
      return view('upload')->with('Error', 'Description is required.');
    }

    // filteron ang fields for empty data
    $Filter = File::where('Filename', $r->Filename)
      ->where('FileDescription', $r->FileDescription)->first();

    if ($Filter) {
      return view('upload')->with('Error', 'File already exist.');
    } else {
      $save = File::insert($fileInfo);
      if ($save) {
        return view('upload')->with('Success', 'Successfully save');
      } else {
        return view('upload')->with('Error', 'Invalid');
      }
    }
  }
  // function to return table
  public function table()
  {
    $files = File::all();
    return view('file_table', compact('files'));
  }
  public function search(Request $r)
  {
    $search = $r->Search;
    $file_search = DB::table('files')->where('Filename', 'LIKE', '%' . $search . '%')->get();
    return view('file_table', ['files' => $file_search]);
  }
}
