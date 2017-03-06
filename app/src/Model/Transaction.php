<?php
namespace App\Model;
 
use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Transaction extends Model
{
	protected $table = 'transaction';

    protected $fillable = ['user_id', 'to', 'description', 'amount', 'approved', 'create_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
}