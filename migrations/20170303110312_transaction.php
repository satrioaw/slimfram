<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Schema;
use App\Model\Transaction as Trx;

class Transaction extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      /*  Capsule::schema()->create('users', function($table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->integer('group_id');
            $table->integer('status');
            $table->nullableTimestamps();
        });
protected $fillable = ['id', 'user_id', 'description', 'amount', 'approved', 'create_at', 'updated_at'];
        */

         Capsule::schema()->create('transaction', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('to')->unsigned();
            $table->string('description');
            $table->bigInteger('amount');
            $table->tinyInteger('approved')->default(0);
            $table->nullableTimestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        $array = array(
            array(
                'user_id'  => '1',
                'to'     => '2',
                'description'  => 'coba kirim ke 2',
                'amount'  => '1000',
                'approved'    => '0'
            ),
            array(
                'user_id'  => '1',
                'to'     => '2',
                'description'  => 'coba kirim ke 2',
                'amount'  => '4000',
                'approved'    => '0'
            ),
            array(
                'user_id'  => '2',
                'to'     => '1',
                'description'  => 'coba kirim ke 1',
                'amount'  => '1000',
                'approved'    => '0'
            )
            );
            Trx::insert($array);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->drop('transaction');
    }
}