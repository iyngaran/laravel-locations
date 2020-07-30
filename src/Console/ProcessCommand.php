<?php


namespace Iyngaran\Location\Console;

use Illuminate\Console\Command;

class ProcessCommand
{
    protected $signature = "location:process";

    protected $description = "Add / Edit or Remove a location";

    public function handle()
    {

        return $this->info(
            'This is from location process'
        );

    }
}