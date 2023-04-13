<?php

namespace App\Mogrations;

interface Migration
{
    public function up();
    public function down();
}
