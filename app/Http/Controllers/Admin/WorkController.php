<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequest;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::paginate(10);

        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Work $work)
    {
        $types = Type::all();

        return view('admin.works.create', compact('work', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Work::generateSlug($form_data['title']);
        $form_data['creation_date'] = date('Y-m-d');

        if(array_key_exists('image', $form_data)){

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('uploads/', $form_data['image']);
        }

        $new_work = new Work;
        $new_work->fill($form_data);
        $new_work->save();

        return redirect()->route('admin.works.show', $new_work);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        $date = date_create($work->creation_date);
        $date_formatted = date_format($date, 'd-m-Y');
        return view('admin.works.show', compact('work', 'date_formatted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $types = Type::all();
        return view('admin.works.edit', compact('work', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkRequest $request, Work $work)
    {
        $form_data = $request->all();
        $date = date_create($work->creation_date);
        $date_formatted = date_format($date, 'd-m-Y');

        if($work->titolo !== $form_data['title']){
            $form_data['slug']  = Work::generateSlug($form_data['title']);
        }else{
            $form_data['slug']  = $work->slug;
        }
        $form_data['creation_date'] = date('Y-m-d');

        if($request->hasFile('image')) {

            if($work->image){
                Storage::disk('public')->delete($work->image);
            }

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image'] = Storage::put('uploads/', $form_data['image']);
        }

        $work->update($form_data);

        return view('admin.works.show', compact('work', 'date_formatted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        if($work->image){
            Storage::disk('public')->delete($work->image);
        }

        $work->delete();

        return redirect()->route('admin.works.index')->with('deleted', "Il lavoro: \" $work->title \" è stato eliminato correttamente!");
    }
}
