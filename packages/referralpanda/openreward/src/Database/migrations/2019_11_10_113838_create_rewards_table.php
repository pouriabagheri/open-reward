<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rewardTable = config('open_reward.rewards_table', 'rewards');

        Schema::create($rewardTable, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rewardable_id')->unsigned();
            $table->string('rewardable_type');
            $table->integer('points')->unsigned();
            $table->integer('rank')->unsigned();
            $table->boolean('active')->default(true);
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
        $rewardTable = config('open_reward.rewards_table', 'rewards');

        Schema::dropIfExists($rewardTable);
    }
}
