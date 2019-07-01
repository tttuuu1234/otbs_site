<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Day;
use App\Models\TheOtherDay;

class DaylyTagUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updated dayly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dayly = new day;
        $theOtherDay = new theOtherDay;
        $daylyTagCounts = $dayly->getTagCount();
        // dd($daylyTagCounts);

        for($i = 0; $i < 10; $i++) {
            $dailyTag = $daylyTagCounts[$i];
            // dd($dailyTag->id);
            $theOtherDay->find($i + 1)->update([
                'name' => $dailyTag->name,
                'count' => $dailyTag->count,
                'tag_id' => $dailyTag->id,
                'updated_at' => $dailyTag->updated_at,
            ]);
        }

        $dayly->resetCount();

    }
}
