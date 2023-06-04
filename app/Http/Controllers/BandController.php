<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller {
    
    public function getAll() {

        $bands = $this->getBands();

        return response()->json($bands);

    }

    public function getById($id) {

        $band = null;

        foreach($this->getBands() as $_band) {
            if($_band['id'] == $id)
                $band = $_band;
        }

        return $band ? response()->json($band) : abort(404);

    }

    public function getByGender($gender) {

        $bands = [];

        foreach($this->getBands() as $_band) {
            if($_band['gender'] == $gender)
                $bands[] = $_band;
        }

        return $band ? response()->json($band) : abort(404);

    }

    public function store(Request $request) {

        $validate = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3'
        ]);

        return response()->json($request->all());

    }

    protected function getBands() {
        
        return [
            [
                'id' => 1, 'name' => 'teather', 'gender' => 'progressive'
            ],
            [
                'id' => 2, 'name' => 'megadeth', 'gender' => 'trash metal'
            ],
            [
                'id' => 3, 'name' => 'dio', 'gender' => 'heavy metal'
            ],
            [
                'id' => 4, 'name' => 'metalica', 'gender' => 'heavy metal'
            ],
            [
                'id' => 5, 'name' => 'barões da pisadinha', 'gender' => 'tecno forró'
            ],
        ];

    }
}
