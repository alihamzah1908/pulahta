<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadataFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata_file', function (Blueprint $table) {
            $table->id();
            $table->integer('opd_file_id')->nullable();
            $table->string('nama_field')->nullable();
            $table->string('tipe')->nullable();
            $table->string('label')->nullable();
            $table->text('kegunaan')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('metadata_file');
    }
}
