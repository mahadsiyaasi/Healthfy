<?php

namespace Healthfy\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use Healthfy\Http\Requests;
use Validator;
use Auth;
use Healthfy\User;
use Healthfy\Http\Controllers\labController;
use Healthfy\Models\Staff;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class usersController extends Controller
{
    /**
     * $appId
     * @var [int]
     */
    protected $appId;
    /**
     * [$appSecret description]
     * @var [string]
     */
   protected $appSecret;
   /**
    * [$tokenExchangeUrl description]
    * @var [type]
    */
   protected $tokenExchangeUrl;
   /**
    * [$endPointUrl description]
    * @var [type]
    */
   protected $endPointUrl;
   /**
    * [$userAccessToken description]
    * @var [type]
    */
   public $userAccessToken;
   /**
    * [$refreshInterval description]
    * @var [type]
    */
   protected $refreshInterval;
   /**
    * [__construct description]
    */
   public function __construct()
   {
      $this->appId            = config('accountkit.app_id');
      $this->client           = new GuzzleHttpClient();
      $this->appSecret        = config('accountkit.app_secret');
      $this->endPointUrl      = config('accountkit.end_point');
      $this->tokenExchangeUrl = config('accountkit.tokenExchangeUrl');
   }
  /**
   * [login description]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
   public function saveUsersEmailandpass(Request $find){
    $validate =  Validator::make($find->all(),[
          'email'=>'required|min:10|email|unique:users',
          'password' => self::rules(),
    ]);
    if ($validate->fails()) {
         return response()->json($validate->messages());
    }else{
      $dataInDB = Staff::find($find->id);
        $find->name = $dataInDB->name;
        $find->language_id=1;
        $find->company_id=Auth::user()->company_id;
        $find->mobile  =$dataInDB->tell;
        $find->phone = $dataInDB->tell;
        $find->address = $dataInDB->address;
        $find->city = $dataInDB->city;
        $find->country= $dataInDB->nationality;
        $find->account=1000121;
        $find->role_type= $dataInDB->type;
        $dataInDB->user_id = self::createAllUserTypes($find);
        $dataInDB->email = $find->email;
        $dataInDB->save();
        return labController::getMessages('success','success.success');
        }
   }
  public function accountkit(Request $request)
  {
      $url = $this->tokenExchangeUrl.'grant_type=authorization_code'.
              '&code='. $request->get('code').
              "&access_token=AA|$this->appId|$this->appSecret";
      $apiRequest = $this->client->request('GET', $url);
      $body = json_decode($apiRequest->getBody());
      $this->userAccessToken = $body->access_token;
      $this->refreshInterval = $body->token_refresh_interval_sec;
      return $this->getData();
  }
  public function getData()
  {
      $request = $this->client->request('GET', $this->endPointUrl.$this->userAccessToken);
      $data = json_decode($request->getBody());
      $userId = $data->id;
      $userAccessToken = $this->userAccessToken;
      $refreshInterval = $this->refreshInterval;
      $phone = isset($data->phone) ? $data->phone->number : '';
      $email = isset($data->email) ? $data->email->address : '';
      return view('index', compact('phone', 'email', 'userId', 'userAccessToken', 'refreshInterval'));
  }
  public function logout()
  {
      return redirect()->route('index');
  }
  public function index()
  {
    return view('welcome');
  }
   public function rules()
    {
        return 'required|min:6|string|regex:/^[a-zA-Z0-9!$#%]+$/';
    }
    public function createAllUserTypes($allval)
      {
        return User::insertGetId([
        'name'=>$allval->name, 
        'email'=>$allval->email,
        'password'=>bcrypt($allval->password),
        'status_id'=>1,
        'default_language_id'=>$allval->language_id,
        'company_id'=>$allval->company_id,
        'mobile'=>$allval->mobile,
        'phone'=>$allval->phone,
        'address'=>$allval->address,
        'city'=>$allval->city,
        'country'=>$allval->country,
        'default_cash_account_id'=>$allval->account,
        'role_type'=>$allval->role_type,
        "date"=>date('Y-m-d H:i:s'),
        'updated_date'=>date('Y-m-d H:i:s'),
        'registered_by'=>$allval->registered_by,
        'remember_token'=>$allval->_token,
        ]);
             
      }
}