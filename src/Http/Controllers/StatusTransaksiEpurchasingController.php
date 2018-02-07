<?php namespace Bantenprov\StatusTransaksiEpurchasing\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\StatusTransaksiEpurchasing\Facades\StatusTransaksiEpurchasing;

/* Models */
use Bantenprov\StatusTransaksiEpurchasing\Models\Bantenprov\StatusTransaksiEpurchasing\StatusTransaksiEpurchasing as PdrbModel;
use Bantenprov\StatusTransaksiEpurchasing\Models\Bantenprov\StatusTransaksiEpurchasing\Province;
use Bantenprov\StatusTransaksiEpurchasing\Models\Bantenprov\StatusTransaksiEpurchasing\Regency;

/* etc */
use Validator;

/**
 * The StatusTransaksiEpurchasingController class.
 *
 * @package Bantenprov\StatusTransaksiEpurchasing
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEpurchasingController extends Controller
{

    protected $province;

    protected $regency;

    protected $status-transaksi-e-purchasing;

    public function __construct(Regency $regency, Province $province, PdrbModel $status-transaksi-e-purchasing)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->status-transaksi-e-purchasing     = $status-transaksi-e-purchasing;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $status-transaksi-e-purchasing = $this->status-transaksi-e-purchasing->find($id);

        return response()->json([
            'negara'    => $status-transaksi-e-purchasing->negara,
            'province'  => $status-transaksi-e-purchasing->getProvince->name,
            'regencies' => $status-transaksi-e-purchasing->getRegency->name,
            'tahun'     => $status-transaksi-e-purchasing->tahun,
            'data'      => $status-transaksi-e-purchasing->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->status-transaksi-e-purchasing->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->status-transaksi-e-purchasing->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

