<?php

use App\Models\Category;
use App\Models\Priority;
use App\Models\User;
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
        //
        Schema::create('todoes', function (Blueprint $table) {
            //
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Priority::class);
            $table->foreignIdFor(Category::class);
            $table->text('todo')->nullable(false);
            $table->text('description')->nullable();
            $table->string('deadline')->nullable(false);
            $table->string('status')->nullable(true);
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
        //
        Schema::table('todoes', function (Blueprint $table) {
            //
            Schema::dropIfExists('todoes');
        });
    }
};
