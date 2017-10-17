<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaddresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ipaddress');
            $table->string('subnet_mask');
            $table->string('default_gateway')->nullable();
            $table->string('dns_server1')->nullable();
            $table->string('dns_server2')->nullable();
            $table->smallInteger('status');
            $table->smallInteger('assign');
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
        Schema::dropIfExists('ipaddresses');
    }
}
