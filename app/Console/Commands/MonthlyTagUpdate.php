<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MonthlyController;
use App\Models\Monthly;
use App\Models\LastMonth;

class MonthlyTagUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updated monthly';

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
    public function handle() //自動で行ってくれる 今回はmonthlyテーブルに格納されているtop10のデータを、lastmonthlyテーブルのレコードに更新してかつ、monthlyテーブルのcountカラムを0にしてまた月初めから　countを増やしている weeklyも同じ
    {
        $monthly = new monthly;
        $lastMonth = new lastMonth;
        $monthlyTagCounts = $monthly->getTagCount();

        for($i = 0; $i < 10; $i++) {
            $month = $monthlyTagCounts[$i];
            $lastMonth->find($i + 1)->update([
                'name' => $month->name,
                'count' => $month->count,
                'updated_at' => $month->updated_at,
            ]);
        }

        $monthly->resetCount();        
    }
}
