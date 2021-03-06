<?php

namespace App\Http\Controllers;

use Kraken;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Phia User
     */
    public function index()
    {
        $recruiments = Recruitment::orderBy('id', 'desc')->paginate(5);
        return view('users.recruit', compact('recruiments'));
    }

    public function detail($recruitID)
    {
        $recruit = Recruitment::find($recruitID);
        // TODO: sua anh

        return view('users.detailRecruit', ['recruit' => $recruit]);
    }

    public function register(Request $request)
    {
        $recruit = Recruitment::find($request->recruitID);
        $create_at = $recruit->created_at->isoFormat('dddd D/MM/YYYY');
        $location = $recruit->location;
        $salary = $recruit->salary;
        // TODO: sua anh

        return view('users.register', [
            'recruit' => $recruit,
            'create_at' => $create_at,
            'location' => $location,
            'salary' => $salary,
            'id' => $request->recruitID,
            'name' => $recruit->name,
        ]);
    }

    /**
     * Phia Admin
     */

    public function index_ad()
    {
        $recruiments = Recruitment::orderBy('id', 'desc')->paginate(10);
        return view('admin.list_recruit', compact('recruiments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create_recruit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        $request->validate(
            [
                'name' => 'required',
                'salary' => 'required|numeric|min:1',
                'location' => 'required',
                'limitation' => 'required|date',
                'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'description' => 'required'
            ],
            [
                'name.required' => '採用タイトルを入力してください',
                'salary.required' => '給料を入力してください',
                'salary.numeric' => '給料は数字でなければなりません',
                'salary.min' => '給料は1より大きくなければなりません',
                'location.required' => '場所を入力してください',
                'limitation.required' => '採用開始日を入力してください',
                'limitation.date' => 'Phải là kiểu date',
                'img.required' => 'イメージをアップロードしてください',
                'img.mimes' => '画像拡張子は「jpg, png, jpeg, gif, svg」が必要です',
                'img.image' => 'イメージ以外はアップロードができません',
                'description.required' => '要約情報を入力してください'
            ]
        );

        $recruit = $request->only(['name', 'salary', 'location', 'limitation', 'description']);

        if ($request->hasFile('img')) {
            $file = $this->save_record_image($request->file('img'));

            if (!empty($file['kraked_url'])) {
                $recruit['img'] = $file['kraked_url'];
            } else {
                return redirect()->back()->with(['error' => 'この画像はサポートされていません。 別の写真を選択してください。']);
            }
        }

        Recruitment::create($recruit);

        return redirect(route('recruit'))->with(['message' => '新しい採用を正常に作成しました。']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recruit = Recruitment::find($id);
        return view('admin.edit_recruit', compact('recruit'));
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
        $request->flash();

        $request->validate(
            [
                'name' => 'required',
                'salary' => 'required|numeric|min:1',
                'location' => 'required',
                'limitation' => 'required|date',
                'description' => 'required'
            ],
            [
                'name.required' => '採用タイトルを入力してください',
                'salary.required' => '給料を入力してください',
                'salary.numeric' => '給料は数字でなければなりません',
                'salary.min' => '給料は1より大きくなければなりません',
                'location.required' => '場所を入力してください',
                'limitation.required' => '採用開始日を入力してください',
                'limitation.date' => 'Phải là kiểu date',
                'description.required' => '要約情報を入力してください'
            ]
        );

        $recruit = $request->only(['name', 'salary', 'location', 'limitation', 'description']);

        if ($request->hasFile('img')) {

            $request->validate([
                'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
            ], [
                'img.required' => 'イメージをアップロードしてください',
                'img.max' => 'イメージのサイズは4096超えできません',
                'img.mimes' => '画像拡張子は「jpg, png, jpeg, gif, svg」が必要です',
                'img.image' => 'イメージ以外はアップロードができません'
            ]);

            $file = $this->save_record_image($request->file('img'));

            if (!empty($file['kraked_url'])) {
                $recruit['img'] = $file['kraked_url'];
            } else {
                return redirect()->back()->with(['error' => 'この画像はサポートされていません。 別の写真を選択してください。']);
            }
        }

        $count = Recruitment::where('id', $id)
            ->update($recruit);
        if ($count == 0) {
            return redirect(route('category'))->with(['message' => '採用情報を正常に失敗しました']);
        }

        return redirect(route('recruit'))->with(['message'=>'採用情報を正常に更新する']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Recruitment::destroy($id);
        if ($count == 0) {
            return redirect(route('recruit'))->with(['message' => '採用の削除に失敗しました']);
        }
        return redirect(route('recruit'))->with(['message' => '採用を正常に削除']);
    }


    /**
     * Ham phu upload anh
     */

    private function save_record_image($image, $name = null)
    {
        $kraken = new Kraken("2cf8e811effba0e8cf4e990beb49d7a2", "113504c156d250effb12e12dc8db3af83978954b");
        $params = array(
            "file" => $image,
            "wait" => true,
            "lossy" => true
        );

        return $kraken->upload($params);
    }
    
    // {
    //     $imageBase64 = base64_encode($image);

    //     $uploadData = [
    //         'key' => config('filesystems.imgbb-api.key'),
    //         'image' => $imageBase64
    //     ];
        
    //     $client = new Client(); 
    //     $response = $client->post(config('filesystems.imgbb-api.url'), ['form_params' => $uploadData]);
        
    //     $data = json_decode($response->getBody()->getContents());

    //     return [
    //         'file_name' => $data->data->image->filename,
    //         'url' => $data->data->url
    //     ];
    // }
    // {
    //     $API_KEY = '53f540128a97fa75d4dfcba827eb0511';
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $API_KEY);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
    //     $file_name = ($name) ? $name . '.' . $extension : $image->getClientOriginalName();
    //     $data = array('image' => base64_encode(file_get_contents($image)), 'name' => $file_name);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     $result = curl_exec($ch);
    //     if (curl_errno($ch)) {
    //         return 'Error:' . curl_error($ch);
    //     } else {
    //         return json_decode($result, true);
    //     }
    //     curl_close($ch);
    // }
}
