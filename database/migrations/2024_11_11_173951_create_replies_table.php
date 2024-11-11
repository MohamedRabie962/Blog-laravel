<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // database/migrations/xxxx_xx_xx_create_replies_table.php

    Schema::create('replies', function (Blueprint $table) {
        $table->id();
        $table->foreignId('comment_id')->constrained()->onDelete('cascade');
        $table->text('body');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};