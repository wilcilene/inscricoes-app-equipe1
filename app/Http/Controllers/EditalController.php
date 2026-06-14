<?php

namespace App\Http\Controllers;



use App\Models\Edital;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search', '');
    $query = Edital::query();


    if (!empty($search)) {

        $query->where(function ($q) use ($search) {
    $q->where('titulo', 'LIKE', "%{$search}%")
        ->orWhere('numero', 'LIKE', "%{$search}%");
});
}

    $editais = $query->orderBy('data_limite', 'asc')->paginate(10);


    return view('mural.index', [
        'editais' => $editais,
        'search'  => $search
]);
}
}
