<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        $jobs = Job::latest()->get()->groupBy('featured');

        return view('jobs.index', [
            'jobs'         => $jobs[0],
            'featuredJobs' => $jobs[1],
            'tags'         => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): Application|Redirector|RedirectResponse
    {
        $atts = request()->validate([
            'title'    => 'required',
            'salary'   => 'required',
            'location' => 'required',
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url'      => 'required|active_url',
            'tags'     => 'nullable',
        ]);

        $atts['featured'] = request()->has('featured');

        $job = auth()->user()->employer->jobs()->create(Arr::except($atts, 'tags'));

        if ( ! empty($atts['tags'])) {
            foreach (explode(',', $atts['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }
}
