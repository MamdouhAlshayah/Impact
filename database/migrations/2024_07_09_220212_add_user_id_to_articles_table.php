<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddUserIdToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        
            Schema::table('article_likes', function (Blueprint $table) {
                $table->renameColumn('articles_id', 'article_id');
                        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_likes', function (Blueprint $table) {
            $table->renameColumn('articles_id', 'article_id');

        });
    }
}
