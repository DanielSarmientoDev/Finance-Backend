<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
class HistoriesController extends Controller
{
    //
    public function getAllHistories(){
        $histories = History::get()->toJson(JSON_PRETTY_PRINT);
        return response($histories,200);
    }

    public function getHistory($id){
        if (History::where('id', $id)->exists()) {
            $history = History::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($history, 200);
          } else {
            return response()->json([
              "message" => "histories not found"
            ], 404);
          }
    }

    public function createHistory(Request $request) {
        $history = new History;
        $history->entry = $request->entry;
        $history->spending = $request->spending;
        $history->save();

        return response()->json([
          "message" => "Book record created"
        ], 201);
    }

    public function updateHistory(Request $request, $id) {
        if (History::where('id', $id)->exists()) {
          $history = History::find($id);

          $history->entry = is_null($request->entry) ? $history->entry : $history->entry;
          $history->spending = is_null($request->spending) ? $history->spending : $history->spending;
          $history->save();

          return response()->json([
            "message" => "history updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "history not found"
          ], 404);
        }
    }
    public function deleteHistory ($id) {
        if(History::where('id', $id)->exists()) {
          $history = History::find($id);
          $history->delete();
          $history->id;

          return response()->json(
              array(
                  'success' => true,
                  'id' => $history->id,
                  'message' => 'se elimino sactifactoriamente.'
                  )
              , 200);
        } else {
          return response()->json([
            "message" => "error al eliminar la historia."
          ], 404);
        }
      }
}
