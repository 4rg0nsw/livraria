<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 40);
            $table->string('editora', 40);
            $table->unsignedInteger('edicao');
            $table->string('ano_publicacao', 4);
            $table->timestamps();
<<<<<<< HEAD

            $table->index('titulo');

=======
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
