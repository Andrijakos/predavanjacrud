<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'pred';

    protected $primaryKey = 'sifPred';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [ 'sifPred', 'kratPred', 'nazPred', 'sifOrgjed', 'upisanoStud', 'brojSatiTjedno' ];
}
