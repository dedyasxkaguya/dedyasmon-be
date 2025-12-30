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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->boolean('isUlasan')->default(false);
            $table->boolean('isBug')->default(false);
            $table->boolean('isData')->default(false);
            $table->boolean('isSaran')->default(false);
            $table->foreignId('user_id');
            $table->integer('rating')->nullable();
            $table->text('text_ulasan')->nullable();
            $table->enum('page_bug', ['profil', 'projek', 'pelajaran', 'kelas', 'gallery', 'feedback', 'login', 'register', 'guru', 'Lainnya'])
                ->nullable();
            $table->text('text_bug')->nullable();
            $table->foreignId('siswa_id')->nullable();
            $table->string('collumn_wrong')->nullable();
            $table->string('data_wrong')->nullable();
            $table->string('data_right')->nullable();
            $table->enum('page_fitur', ['profil', 'projek', 'pelajaran', 'kelas', 'gallery', 'feedback', 'login', 'register', 'guru', 'Lainnya'])->nullable();
            $table->text('text_fitur')->nullable();
            $table->foreignId('FeedbackComment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
