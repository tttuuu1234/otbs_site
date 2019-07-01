<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\WeeklyController;
use App\Models\Weekly;
use App\Models\LastWeek;

class WeeklyTagUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updated weekly';

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
        $weekly = new weekly;
        $lastWeek = new lastWeek;
        $weeklyTagCounts = $weekly->getTagCount(); //上位10件取得

        for($i = 0; $i < 10; $i++) {
            $weeklyTag = $weeklyTagCounts[$i]; //$weeklyTagCountsの配列の0番目から
            $lastWeek->find($i + 1)->update([ //$lastWeekモデルのidの1からupdateさせてる 2,3と増えていく 最初は初期データを入れている 入れないとエラーになる
                'name' => $weeklyTag->name,
                'count' => $weeklyTag->count,
                'tag_id' => $weeklyTag->id,
                'updated_at' => $weeklyTag->updated_at,
            ]);
        } //10件のレコードがlastweekモデルに格納される
        
        $weekly->resetCount(); // weeklyモデルのcountカラムを0にする

    }
}
