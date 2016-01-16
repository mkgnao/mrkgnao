<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdContentsTable extends Migration
{
    protected $primaryKey = 'name';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_contents', function (Blueprint $table) {
            $table->string('name');
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('md_contents');
    }
}
