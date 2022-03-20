<?php

namespace Staudenmeir\EloquentEagerLimit\Tests;

use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use PHPUnit\Framework\TestCase as Base;
use Staudenmeir\EloquentEagerLimit\Tests\Models\Comment;
use Staudenmeir\EloquentEagerLimit\Tests\Models\Country;
use Staudenmeir\EloquentEagerLimit\Tests\Models\Post;
use Staudenmeir\EloquentEagerLimit\Tests\Models\Role;
use Staudenmeir\EloquentEagerLimit\Tests\Models\Tag;
use Staudenmeir\EloquentEagerLimit\Tests\Models\User;

abstract class TestCase extends Base
{
    protected function setUp(): void
    {
        parent::setUp();

        $config = require __DIR__.'/../config/database.php';

        $db = new DB();
        $db->addConnection($config[getenv('DATABASE') ?: 'sqlite']);
        $db->setAsGlobal();
        $db->bootEloquent();

        $this->migrate();

        $this->seed();
    }

    /**
     * Migrate the database.
     *
     * @return void
     */
    protected function migrate()
    {
        DB::schema()->dropAllTables();

        DB::schema()->create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        DB::schema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id');
        });

        DB::schema()->create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        DB::schema()->create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('commentable');
            $table->timestamps();
        });

        DB::schema()->create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        DB::schema()->create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('user_id');
        });

        DB::schema()->create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        DB::schema()->create('taggables', function (Blueprint $table) {
            $table->unsignedInteger('tag_id');
            $table->morphs('taggable');
        });
    }

    /**
     * Seed the database.
     *
     * @return void
     */
    protected function seed()
    {
        Model::unguard();

        Country::create();
        Country::create();

        User::create(['country_id' => 1]);
        User::create(['country_id' => 2]);

        Post::create(['user_id' => 1, 'created_at' => new Carbon('2018-01-01 00:00:01')]);
        Post::create(['user_id' => 1, 'created_at' => new Carbon('2018-01-01 00:00:02')]);
        Post::create(['user_id' => 1, 'created_at' => new Carbon('2018-01-01 00:00:03')]);
        Post::create(['user_id' => 2, 'created_at' => new Carbon('2018-01-01 00:00:04')]);
        Post::create(['user_id' => 2, 'created_at' => new Carbon('2018-01-01 00:00:05')]);
        Post::create(['user_id' => 2, 'created_at' => new Carbon('2018-01-01 00:00:06')]);

        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 1,
            'created_at' => new Carbon('2018-01-01 00:00:01'),
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 1,
            'created_at' => new Carbon('2018-01-01 00:00:02'),
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 1,
            'created_at' => new Carbon('2018-01-01 00:00:03'),
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 2,
            'created_at' => new Carbon('2018-01-01 00:00:04'),
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 2,
            'created_at' => new Carbon('2018-01-01 00:00:05'),
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 2,
            'created_at' => new Carbon('2018-01-01 00:00:06'),
        ]);

        Role::create(['created_at' => new Carbon('2018-01-01 00:00:01')]);
        Role::create(['created_at' => new Carbon('2018-01-01 00:00:02')]);
        Role::create(['created_at' => new Carbon('2018-01-01 00:00:03')]);
        Role::create(['created_at' => new Carbon('2018-01-01 00:00:04')]);
        Role::create(['created_at' => new Carbon('2018-01-01 00:00:05')]);
        Role::create(['created_at' => new Carbon('2018-01-01 00:00:06')]);

        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => 1],
            ['role_id' => 2, 'user_id' => 1],
            ['role_id' => 3, 'user_id' => 1],
            ['role_id' => 4, 'user_id' => 2],
            ['role_id' => 5, 'user_id' => 2],
            ['role_id' => 6, 'user_id' => 2],
        ]);

        Tag::create(['created_at' => new Carbon('2018-01-01 00:00:01')]);
        Tag::create(['created_at' => new Carbon('2018-01-01 00:00:02')]);
        Tag::create(['created_at' => new Carbon('2018-01-01 00:00:03')]);
        Tag::create(['created_at' => new Carbon('2018-01-01 00:00:04')]);
        Tag::create(['created_at' => new Carbon('2018-01-01 00:00:05')]);
        Tag::create(['created_at' => new Carbon('2018-01-01 00:00:06')]);

        DB::table('taggables')->insert([
            ['tag_id' => 1, 'taggable_type' => Post::class, 'taggable_id' => 1],
            ['tag_id' => 2, 'taggable_type' => Post::class, 'taggable_id' => 1],
            ['tag_id' => 3, 'taggable_type' => Post::class, 'taggable_id' => 1],
            ['tag_id' => 4, 'taggable_type' => Post::class, 'taggable_id' => 2],
            ['tag_id' => 5, 'taggable_type' => Post::class, 'taggable_id' => 2],
            ['tag_id' => 6, 'taggable_type' => Post::class, 'taggable_id' => 2],
        ]);

        Model::reguard();
    }
}
