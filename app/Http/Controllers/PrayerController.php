<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrayerRequest;
use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function index()
    {
        $prayers = Prayer::all();

        return view('prayer.index', compact('prayers'));
    }

    public function create()
    {
        return view('prayer.create');
    }

    public function store(CreatePrayerRequest $storePrayerRequest)
    {
        $prayer = Prayer::create(
            $storePrayerRequest->only([
                'title',
                'content',
                'owner_name'
            ])
        );

        return redirect(
            route('prayer')
        )->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $prayer = Prayer::findOrFail($id);

        return view('prayer.edit', compact('prayer'));
    }

    public function update($id, UpdatePrayerRequest $request)
    {
        $prayer = Prayer::findOrFail($id);

        $prayer->update(
            $request->only([
                'title',
                'content',
                'owner_name'
            ])
        );

        return redirect(route('prayer'))
            ->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $prayer = Prayer::findOrFail($id);

        $prayer->delete();

        return redirect(route('prayer'))
            ->with('success', 'Xoá thành công');
    }
}
