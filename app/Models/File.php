<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'FileId',
        'FileUpload',
        'FileFolder',
        'FilePath',
        'FileDescription'
    ];
    protected $table = 'files';
    protected $primaryKey = 'FileId';
}
