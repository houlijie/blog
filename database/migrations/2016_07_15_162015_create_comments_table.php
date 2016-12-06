<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nickname');
			$table->string('email')->nullable();
			$table->string('website')->nullable();
			$table->string('content')->nullable();
			$table->integer('article_id');
            $table->timestamp('created_time');
        });

        // Schema::table('comments',function(Blueprint $table){
        //  //   $table->dropColumn('updated_at');
        //     $table->renameColumn('created_time','created_time');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
