<?php

namespace App\Http\Controllers;

use App\Obatalkes;
use App\Recipe;
use App\RecipeItem;
use App\Signa;
use Illuminate\Http\Request;
use PDF;
class ObatController extends Controller
{
    public function autoCompleteObat(Request $request)
    {

        $data = Obatalkes::where("obatalkes_nama", 'LIKE', '%' . $request->data . "%")
            ->get()->pluck('obatalkes_nama');

        return response()->json($data);
    }

    public function autoCompleteSigna(Request $request)
    {

        $data = Signa::where("signa_nama", 'LIKE', '%' . $request->data . "%")
            ->get()->pluck('signa_nama');

        return response()->json($data);
    }

    public function stockCheck(Request $request)
    {
        $data = Obatalkes::select('stok')->where("obatalkes_nama", $request->data)->first();
        if ($data) {
            return response()->json($data);
        } else {
            return null;
        }
    }

    public function createRacikan(Request $request)
    {
        $data_list = $request->formData;
        $recipe = Recipe::create([
            'recipe_code' => 'RE/' . trim(substr($data_list[0]['obat'], 0, 2), " ") . '/' . trim(substr($data_list[0]['signa'], 0, 2), " ") . '/' . $data_list[0]['qty']
        ]);

        foreach ($data_list as $data) {
            $obat_id = Obatalkes::where('obatalkes_nama', $data['obat'])->first();
            $signa_id = Signa::where('signa_nama', $data['signa'])->first()['signa_id'];
            $recipe_item = RecipeItem::create([
                'recipe_id' => $recipe->id,
                'obat_id' => $obat_id['obatalkes_id'],
                'signa_id' => $signa_id,
                'stok' => $data['qty']
            ]);

            $obat_id->update([
                'stok' => $obat_id->stok -  $data['qty']
            ]);
            $obat_id->save();
        }
        return response()->json($data_list);
    }

    public function recipeDetail(Request $request)
    {
        $recipe_list = Recipe::where('id', $request->id)->first()->recipeDetails()->get();

        foreach ($recipe_list as $recipe) {
            $recipe->obat = $recipe->detailObat()->first()->obatalkes_nama;
            $recipe->signa = $recipe->detailSigna()->first()->signa_nama;
        }

        return response()->json($recipe_list);
    }

    public function download($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $recipe_list = $recipe->recipeDetails()->get();
        foreach ($recipe_list as $recipe_item) {
            $recipe_item->obat = $recipe_item->detailObat()->first()->obatalkes_nama;
            $recipe_item->signa = $recipe_item->detailSigna()->first()->signa_nama;
        }
        $recipe->date = $newDate = date("d-m-Y h:i", strtotime($recipe->created_at));
        // return response()->json($recipe);
        $pdf = PDF::loadview('obat', ['obat'=>$recipe_list, 'recipe_detail'=>$recipe]);
        return $pdf->download('resep.pdf');
    }

    public function createNonRacikan(Request $request)
    {

        $recipe = Recipe::create([
            'recipe_code' => 'RE/' . trim(substr($request->obat, 0, 2), " ") . '/' . trim(substr($request->signa, 0, 2), " ") . '/' . $request->qty
        ]);

        $obat_id = Obatalkes::where('obatalkes_nama', $request->obat)->first();
        $signa_id = Signa::where('signa_nama', $request->signa)->first()['signa_id'];
        $recipe_item = RecipeItem::create([
            'recipe_id' => $recipe->id,
            'obat_id' => $obat_id['obatalkes_id'],
            'signa_id' => $signa_id,
            'stok' => $request->qty
        ]);

        $obat_id->update([
            'stok' => $obat_id->stok -  $request->qty
        ]);
        $obat_id->save();
        return response()->json($obat_id);
    }

    public function recipeList(Request $request)
    {
        $search = $request->query('search', array('value' => '', 'regex' => false));
        $draw = $request->query('draw', 0);
        $start = $request->query('start', 0);
        $length = $request->query('length', 25);
        // $filter = $search['value'];
        if ($request->order) {
            $order = array($request->order[0]['column'], $request->order[0]['dir']);
        } else {
            $order = $request->query('order', array(0, 'asc'));
        }

        $sortColumns = array(
            0 => 'id',
            1 => 'bank_name',
            2 => 'account_number',
            3 => 'withdraw_number',
            4 => 'price',
            5 => 'status',
            6 => 'withdraw_date',
        );

        $query = Recipe::query();

        // if (!empty($filter)) {
        //     $query
        //         ->where('withdraw_number', 'like', '%' . $filter . '%')
        //         ->orWhere('bank_name', 'like', '%' . $filter . '%')
        //         ->orWhere('account_name', 'like', '%' . $filter . '%')
        //         ->orWhere('account_number', 'like', '%' . $filter . '%')
        //         ->orWhere('price', 'like', '%' . $filter . '%')
        //         ->orWhere('withdraw_date', 'like', '%' . $filter . '%')
        //         ->orWhere('status', 'like', '%' . $filter . '%');
        // }

        $recordsTotal = $query->count();
        $sortColumnName = $sortColumns[$order[0]];
        $query
            ->orderBy($sortColumnName, $order[1])
            ->take($length)
            ->skip($start);

        $json = array(
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => [],
        );
        $listWithdraw = $query->get();
        $json['data'] = $listWithdraw;

        return $json;
    }
}
