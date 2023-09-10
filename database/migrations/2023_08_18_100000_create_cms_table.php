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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->string('description', 400)->nullable()->default('');
            $table->longText('content');
            $table->integer('author_id');
            $table->string('status', 60)->default('published');
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->datetime('published_at')->nullable();
            $table->string('lock_password')->nullable();
            $table->string('layout', 255)->nullable();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->string('description', 400)->nullable();
            $table->longText('content')->nullable();
            $table->string('status', 60)->default('published');
            $table->integer('author_id');
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->integer('rate')->unsigned()->default(0);
            $table->string('format_type', 30)->nullable();
            $table->string('layout', 255)->nullable();
            $table->datetime('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('description', 400)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->string('status', 60)->default('published');
            $table->integer('author_id');
            $table->string('icon', 60)->nullable();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_default')->unsigned()->default(0);
            $table->string('layout', 255)->nullable();
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
            $table->string('description', 400)->nullable()->default('');
            $table->string('status', 60)->default('published');
            $table->timestamps();
        });
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('tag_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
        });
        Schema::create('menu_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->json('localtions', 1000);
        });
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->integer('menu_location_id');
            $table->string('name', 255);
            $table->string('link', 500)->nullable();
            $table->string('class_attr', 500)->nullable();
            $table->string('data_component', 500)->nullable();
            $table->longText('data_params')->nullable();
            $table->string('type', 255)->default('custom'); //custom/Post/Page/Catalog/Shortcode
            $table->string('data_id', 255)->nullable();
            $table->integer('order')->default(0);
        });
        Schema::create('menus_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->integer('menus_id');
            $table->string('name', 255)->nullable();
            $table->string('menu_value', 255)->nullable();
            $table->string('link', 500)->nullable();
            $table->string('class', 500)->nullable();

            $table->primary(['lang_code', 'menus_id'], 'menus_translations_primary');
        });
        Schema::create('posts_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->integer('posts_id');
            $table->string('slug', 500);
            $table->string('name', 255)->nullable();
            $table->string('description', 400)->nullable();
            $table->longText('content')->nullable();

            $table->primary(['lang_code', 'posts_id'], 'posts_translations_primary');
        });

        Schema::create('categories_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->integer('categories_id');
            $table->string('name', 255)->nullable();
            $table->string('slug', 500);
            $table->string('description', 400)->nullable();

            $table->primary(['lang_code', 'categories_id'], 'categories_translations_primary');
        });
        Schema::create('tags_translations', function (Blueprint $table) {
            $table->string('lang_code');
            $table->integer('tags_id');
            $table->string('slug', 500);
            $table->string('name', 255)->nullable();
            $table->string('description', 400)->nullable();

            $table->primary(['lang_code', 'tags_id'], 'tags_translations_primary');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned()->default(0);
            $table->integer('commentable_id');
            $table->string('commentable_type', 255);
            $table->text('content')->nullable();
            $table->string('status', 60)->default('published');
            $table->integer('author_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('tags_translations');
        Schema::dropIfExists('categories_translations');
        Schema::dropIfExists('posts_translations');
        Schema::dropIfExists('menus_translations');
        Schema::dropIfExists('menu_locations');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('catalogs');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('pages');
    }
};
