<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
	public function up(): void
	{
		Schema::create('posts', function (Blueprint $table) {
			$table->id(); // Auto-increment primary key
			$table->string('title'); // Title of the article
			$table->text('body'); // Body/content of the article
			$table->timestamps(); // created_at and updated_at
		});
	}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
