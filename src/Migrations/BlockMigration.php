<?php

namespace LuongoLabs\BlockMigrate\Migrations;

use Illuminate\Database\Migrations\Migration;

abstract class BlockMigration extends Migration
{
    abstract public function up();

    abstract public function down();
}
