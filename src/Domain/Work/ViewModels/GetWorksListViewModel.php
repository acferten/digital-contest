<?php

namespace Domain\Work\ViewModels;

use Domain\Shared\ViewModels\ViewModel;
use Domain\Work\Models\Work;

class GetWorksListViewModel extends ViewModel
{
    public function __construct(
    ) {
    }

    public function works()
    {
        return Work::all()->map(fn (Work $work) => $work->getData());
    }
}
