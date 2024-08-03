<?php

namespace Domain\Work\Actions;

use Domain\Work\Models\Work;
use Illuminate\Support\Facades\DB;

class ResetWorksVotesAction
{
    public function __invoke(): void
    {
        $best_works = Work::query()->withCount('votes')
            ->orderBy('votes_count', 'DESC')
            ->limit(10)
            ->get()
            ->where('votes_count', '>', 0);

        if ($best_works->isNotEmpty()) {
            $bonuses = 10;

            foreach ($best_works as $work) {
                $work->update(['bonus_points' => $bonuses]);
                $work->refresh();
                $bonuses = $bonuses - 1;
            }
        }

        DB::table('votes')->delete();
    }
}
