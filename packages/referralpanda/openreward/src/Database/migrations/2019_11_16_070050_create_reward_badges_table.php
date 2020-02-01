<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $badgeTable = config('open_reward.badges_table', 'badges');
        $userBadgesTable = config('open_reward.badge_users_table', 'badge_users');


        Schema::create($badgeTable, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::create($userBadgesTable, function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('badge_id');
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
        $badgeTable = config('open_reward.badges_table', 'badges');
        $userBadgesTable = config('open_reward.badge_users_table', 'badge_users');

        Schema::dropIfExists($badgeTable);
        Schema::dropIfExists($userBadgesTable);
    }
}
