<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) { //nella tabella project
            $table->unsignedBigInteger('type_id')->nullable()->after('id'); // creo il campo type_id, che è' la chiave esterna

            $table->foreign('type_id')
                ->references('id') // che è collegato al campo id
                ->on('types')  // della tabella types
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // $table->dropForeign('types_type_id_foreign'); // types_ (tabella), type_id (campo) _foreign
            $table->dropForeign(['type_id']); // elimino la relazione
            $table->dropColumn('type_id'); // elimino la colonna
        });
    }
};
