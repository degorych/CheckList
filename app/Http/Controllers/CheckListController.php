<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckItem;
use App\CheckList;

class CheckListController extends Controller
{
    public function view()
    {
        return view('index');
    }

    public function create(Request $request)
    {
        $newCheckList = CheckList::create([
            'name' => $request->input('check-list-name'),
            'color' => $request->input('check-list-color'),
            'description' => $request->input('check-list-description'),
        ]);

        $inputs = $request->input();
        $inputsNumber = count($inputs['item-title']);

        for ($i = 0; $i < $inputsNumber; $i++) {
            $checkListItems = CheckItem::create([
                'check_list_id' => $newCheckList->id,
                'title' => $inputs['item-title'][$i],
                'description' => $inputs['item-description'][$i],
                'is_done' => isset($inputs['is-done'][$i]) ? 1 : 0,
                'order' => $inputs['item-order'][$i],
            ]);
        }

        return redirect()->route('index')->with('message', 'You add new check list successfully');
    }

    public function showList() {
        $checkLists = CheckList::paginate(2);

        return view('list', ['checkLists' => $checkLists]);
    }
}
