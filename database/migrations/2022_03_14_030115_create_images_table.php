<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('offer_id');
            $table->string('name');
            $table->string('alt');
            $table->foreign('offer_id') // Tworzenie relacji. Określenie kolumny z tej tabeli
                ->references('id') // Określenie kolumny z tabeli zewnętrznej
                ->on('offers') // Określenie, z którą tabelą ma zostać stworzona relacja.
                ->onDelete('cascade'); // Usuwanie kaskadowe
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
        Schema::dropIfExists('images');
    }
}
