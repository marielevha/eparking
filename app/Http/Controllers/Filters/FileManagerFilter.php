<?php


namespace App\Http\Controllers\Filters;

use App\Models\Series;
use App\Models\Subject;
use Illuminate\Support\Facades\Request as RQ;

class FileManagerFilter
{
    public function filterSubjectsBySeries()
    {
        $filters = RQ::all('series_id', 'subjects_id');
        $series = Series::orderByTitle()
            ->get(['id', 'title'])
            ->toArray();
        $subjects = Subject::orderByTitle()
            ->filter(RQ::all('series_id'))
            ->get(['id', 'title', 'series_id'])
            ->toArray();
        $data = [
            'filters' => $filters,
            'series' => $series,
            'subjects' => $subjects,
        ];
        return response()->json($data);
    }
}
