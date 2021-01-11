<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamFilterRequest;
use App\Http\Requests\TeamFilterRequestPages;
use App\Http\Requests\UpdateRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private function validateAge($request) {
        if ($request->sortAgeStart and $request->sortAgeEnd and $request->sortAgeStart > $request->sortAgeEnd) {
            abort('422', 'error');
        }
    }
    private function queryBuilder( $request) {
        $arrSearch = [];
        if($request->searchName) {
            array_push($arrSearch, ['name', $request -> searchName]);
        }
        if ($request->sortName) {
            array_push($arrSearch, ['name', 'like', "%$request->sortName%"]);
        }
        if ($request->sortAgeStart) {
            array_push($arrSearch, ['age', '>=', $request->sortAgeStart]);
        }
        if ($request->sortAgeEnd) {
            array_push($arrSearch, ['age', '<=', $request->sortAgeEnd]);
        }
        return $arrSearch;
    }


    public function count(TeamFilterRequest $request)
    {
        $arrSearch = $this->queryBuilder($request);
        $this->validateAge($request);
        if(isset($arrSearch)) {
          return Team::query()->where($arrSearch)->count();
        } else {
          return Team::query()->count();
        }
    }
    public function listPage (TeamFilterRequestPages $request)
    {
        $arrSearch = $this->queryBuilder($request);
        $this->validateAge($request);
        $start = $request -> start;
        $finish = $request -> finish;
        if(isset($arrSearch)) {
            return Team::where($arrSearch)->limit($finish)->offset($start)->get();
        } else {
            return Team::limit($finish)->offset($start)->get();
        }
    }


    public function deleteItem(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric|min:0'
        ]);
        $id = $request->id;
        $res = Team::where('id', '=', $id)->delete();
        return $res;
    }
    public function update(UpdateRequest $request)
    {
        $id = $request->id;
        $name = $request->name;
        $surname = $request->surname;
        $profession = $request->profession;
        $age = $request->age;
        return Team::where('id', $id)->update(
            ['name' => $name, 'surname' => $surname, 'profession' => $profession, 'age' => $age]
        );
    }
}
