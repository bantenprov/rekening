<?php namespace Bantenprov\Rekening\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Rekening\Facades\Rekening;

/* Model */
use Bantenprov\Rekening\Models\RekeningModel;

/* ETC */
use Ramsey\Uuid\Uuid;

/**
 * The RekeningController class.
 *
 * @package Bantenprov\Rekening
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekenings = RekeningModel::with('getUser')->get();

        return view('rekening::index',compact('rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekening::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode'      => 'required|unique:rekenings,kode',
            'nama'      => 'required',
            'level'     => 'required',
        ]);

        RekeningModel::create([
            'uuid'          => Uuid::uuid5(Uuid::NAMESPACE_DNS, 'bantenprov.go.id'.date('YmdHis')),
            'nama'          => $request->nama,
            'kode'          => $request->kode,
            'level'         => $request->level,
            'user_id'       => \Auth::user()->id,
            'user_update'   => \Auth::user()->id,
        ]);

        $request->session()->flash('message', 'Successfully add the rekening!');

        return redirect()->route('rekening.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rekening = RekeningModel::find($id);

        return view('rekening::show', compact('rekening'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekening = RekeningModel::find($id);

        return view('rekening::edit', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'kode'      => 'required|unique:rekenings,id,'.$id,
            'nama'      => 'required',
        ]);

        RekeningModel::find($id)->update([
            'nama'          => $request->nama,
            'kode'          => $request->kode,
            'user_update'   => \Auth::user()->id,
        ]);

        $request->session()->flash('message', 'Successfully modified the rekening!');

        return redirect()->route('rekening.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RekeningModel::find($id)->delete();

        $request->session()->flash('message', 'Successfully delete the rekening!');
    }
}
