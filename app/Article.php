<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $guarded = [];
    protected $fillable = ['title', 'slug', 'content']; 

    public function getRouteKeyName()
    {
        return 'slug'; // default id        
    }

    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id');
        return $this->belongsTo(User::class); 

        // parameter user_id adalah nilai default dari nama method (user()).
        // jika nama kolom pada tabel ditulis mengikuti aturan laravel, maka tidak masalah jika parameter tidak ditulis. secara default isinya adalah user_id
        // jika nama kolom pada tabel ditulis selain user_id, misalkan 'owner' maka parameter harus ditulis 'owner'
    }
}


