<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
  public function upload_file()
  {
    return view('upload');
  }
  public function store(Request $r)
  {
    // global $file;
    //get upload_file from form
    $file = $r->Filename;
    //upload file to laravel storage
    Storage::disk('local')->put($file, 'Contents');
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
  public function table()
  {
    $files = DB::select('select * from files');
    return view('file_table', ['files' => $files]);
  }
}
