
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->renameColumn('fechaPrestamo', 'fechPrestamo');
            $table->renameColumn('fechaDevolucion', 'fechDevolucion');
        });
    }

    public function down(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->renameColumn('fechPrestamo', 'fechaPrestamo');
            $table->renameColumn('fechDevolucion', 'fechaDevolucion');
        });
    }
};
