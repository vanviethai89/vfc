<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrayerRequest;
use App\Http\Requests\UpdatePrayerRequest;
use App\Models\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrayerController extends Controller
{
    public function __construct()
    {
//        $this->authorizeResource(Prayer::class, 'prayer');
    }

    public function index(Request $request)
    {
        $page = $request->get('page', 1);

        $prayerPaginator = Prayer::orderByDesc('priority')
            ->orderByDesc('created_at')
            ->paginate(25);

        return view('prayer.index', compact('prayerPaginator'));
    }

    public function show($id)
    {
        $prayer = Prayer::findOrFail($id);

        return $prayer;
    }

    public function create()
    {
        $this->authorize('create', Prayer::class);

        return view('prayer.create');
    }

    public function store(CreatePrayerRequest $storePrayerRequest)
    {
        $this->authorize('create', Prayer::class);

        $prayer = Prayer::create(
            $storePrayerRequest->only([
                'title',
                'content'
            ])
        );

        $prayer->status = Prayer::STATUS_ACTIVE;
        $prayer->priority = 1;
        $prayer->save();

        return redirect(
            route('prayer')
        )->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $prayer = Prayer::findOrFail($id);

        $this->authorize('edit', $prayer);

        return view('prayer.edit', compact('prayer'));
    }

    public function update($id, UpdatePrayerRequest $request)
    {
        $prayer = Prayer::findOrFail($id);

        $this->authorize('edit', $prayer);

        $prayer->update(
            $request->only([
                'title',
                'content',
                'status'
            ])
        );

        return redirect(route('prayer.index'))
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $prayer = Prayer::findOrFail($id);

        $this->authorize('delete', $prayer);

        $prayer->delete();

        return redirect(route('prayer.index'))
            ->with('success', 'Xoá thành công');
    }

    public function increaseTotalPrayer($id)
    {
        Prayer::where('id', $id)
            ->update([
                'total_prayer' => DB::raw('total_prayer+1')
            ]);

        session()->push('prayed_ids', $id);

        return true;
    }
}
