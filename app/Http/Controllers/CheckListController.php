<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckItem;
use App\CheckList;
use App\Http\Requests\CheckListRequest;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkLists = CheckList::paginate(10);
        return view('list', ['checkLists' => $checkLists]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CheckListRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CheckListRequest $request)
    {
        $newCheckList = CheckList::create([
            'name' => $request->input('check-list-name'),
            'user_id' => $request->user()->id ?? null,
            'color' => $request->input('check-list-color'),
            'description' => $request->input('check-list-description'),
        ]);

        $inputs = $request->only('item-title', 'item-description', 'item-order');
        $inputsNumber = count($inputs['item-title']);

        for ($i = 0; $i < $inputsNumber; $i++) {
            CheckItem::create([
                'check_list_id' => $newCheckList->id,
                'title' => $inputs['item-title'][$i],
                'description' => $inputs['item-description'][$i],
                'order' => $inputs['item-order'][$i],
            ]);
        }

        return redirect()->route('list.show', $newCheckList['name'])->with('message',
            'You add new check list successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $checkList = CheckList::where('name', $name)->first();
        $checkListParams = $checkList->checkItems->where('is_done', 0)->sortBy('order');
        return view('checkList', ['checkList' => $checkList, 'checkListParams' => $checkListParams]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $checkList = CheckList::where('name', $name)->first();
        $checkListParams = $checkList->checkItems;
        return view('edit', ['checkList' => $checkList, 'checkListParams' => $checkListParams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CheckListRequest $request
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CheckListRequest $request, $name)
    {
        $checkList = $request->only('check-list-title', 'check-list-description');
        CheckList::where('name', $name)->update([
            'name' => $request->input('check-list-title'),
            'description' => $request->input('check-list-description')
        ]);

        $listItems = $request->only('item-title', 'item-description', 'item-order', 'is_done');

        $formatList = [];
        foreach ($listItems as $itemName => $itemValues) {
            foreach ($itemValues as $itemId => $itemValue) {
                $formatList[$itemId][ltrim($itemName, 'item-')] = $itemValue;
            }
        }

        foreach ($formatList as $itemId => $item) {
            $item['is_done'] = isset($item['is_done']) ? true : false;
            CheckItem::findOrFail($itemId)->update($item);
        }

        return redirect()->route('list.show',
            ['name' => $checkList['check-list-title']])->with(['message' => 'Check list updated']);
    }

    /**
     * Hide check list item if he is done.
     * @param Request $request
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function done(Request $request, $name)
    {
        $inputs = $request->only('is-done');

        if (!empty($inputs)) {
            foreach ($inputs['is-done'] as $id => $input) {
                $checkListItem = CheckItem::find($id);
                $checkListItem->is_done = true;
                $checkListItem->save();
            }
        }

        return redirect()->route('list.show', ['name' => $name])->with(['message' => 'Check list updated']);
    }
}
