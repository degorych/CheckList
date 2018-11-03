<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckItem;
use App\CheckList;

class CheckListController extends Controller
{
    public function create(Request $request)
    {
        $newCheckList = CheckList::create([
            'name' => $request->input('check-list-name'),
            'user_id' => $request->user()->id ?? null,
            'color' => $request->input('check-list-color'),
            'description' => $request->input('check-list-description'),
        ]);

        $inputs = $request->input();
        $inputsNumber = count($inputs['item-title']);

        for ($i = 0; $i < $inputsNumber; $i++) {
            $checkListItems[] = CheckItem::create([
                'check_list_id' => $newCheckList->id,
                'title' => $inputs['item-title'][$i],
                'description' => $inputs['item-description'][$i],
                'order' => $inputs['item-order'][$i],
            ]);
        }

        return redirect()->route('showCheckList', $newCheckList['name'])->with('message',
            'You add new check list successfully');
    }

    public function showList()
    {
        $checkLists = CheckList::paginate(10);
        return view('list', ['checkLists' => $checkLists]);
    }

    public function showItem($name)
    {
        $checkList = CheckList::where('name', $name)->first();
        $checkListParams = $checkList->checkItems;
        return view('checkList', ['checkList' => $checkList, 'checkListParams' => $checkListParams]);
    }

    public function saveList(Request $request)
    {
        $inputs = $request->input() ?? [];

        foreach ($inputs['is-done'] as $id => $input) {
            $checkListItem = CheckItem::find($id);
            $checkListItem->is_done = true;
            $checkListItem->save();
        }

        return redirect()->back()->with(['message' => 'Check list saved']);
    }

    public function editList($name)
    {
        $checkList = CheckList::where('name', $name)->first();
        $checkListParams = $checkList->checkItems;
        return view('edit', ['checkList' => $checkList, 'checkListParams' => $checkListParams]);
    }

    public function updateList(Request $request)
    {

        dd($request->input());

//        $inputs = $request->input();
//        $inputsNumber = count($inputs['item-title']);
//
//        for ($i = 0; $i < $inputsNumber; $i++) {
//            $checkListItems[] = CheckItem::create([
//                'check_list_id' => $newCheckList->id,
//                'title' => $inputs['item-title'][$i],
//                'description' => $inputs['item-description'][$i],
//                'order' => $inputs['item-order'][$i],
//            ]);
//        }
    }
}
