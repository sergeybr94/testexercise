<?

namespace SB\Cars\Rest;

use Bitrix\Main\Context;

class CoreApi
{
    protected $namespace = '\SB\Cars\Rest\\';
    protected $module = 'dealer';
    protected $entityName = ''; //Имя сущности(car, brand, model, options)
    protected $method = ''; //GET|POST|PUT|DELETE
    protected $arUri = [];
    protected $status = 500;
    protected $request = 500;

    public $response = false;

    /**
     * CoreApi constructor.
     */
    public function __construct()
    {
        $this->request = Context::getCurrent()->getRequest();
        $this->arUri = explode('/', trim($this->request->getDecodedUri(), '/'));
        $this->method = $this->request->getRequestMethod();
        $this->run();
    }

    public static function init(){
        $justDoIt = new CoreApi();

        if($justDoIt->response){
            global $APPLICATION;
            $APPLICATION->RestartBuffer();
            $justDoIt->setHeaders();
            echo $justDoIt->response;
            die();
        }
    }

    /**
     * @return bool
     */
    protected function run()
    {
        if (array_shift($this->arUri) !== 'api' || array_shift($this->arUri) !== $this->module)
            return false;

        $this->entityName = $this->namespace.ucfirst(array_shift($this->arUri)).'Api';
        if (class_exists($this->entityName)) {
            $action = $this->getAction();
            if (method_exists($this->entityName, $action)) {
                $entityApi = new $this->entityName($this->request->getValues());
                list($data, $status) =  $entityApi->{$action}();
                $this->setResponse($data, $status);
            } else {
                $this->setResponse('API not found', 404);
            }
        }
    }

    protected function setResponse($data, $status = 500)
    {
        if ($status >= 200 && $status < 300) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }
        $response['result'] = $data;

        $this->response = json_encode($response);
        $this->status = $status;
    }

    protected function requestStatus($code)
    {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code]) ? $status[$code] : $status[500];
    }

    protected function getAction()
    {
        $method = $this->method;
        switch ($method) {
            case 'GET':
                return 'get';
                break;
            case 'POST':
                return 'create';
                break;
            case 'PUT':
                return 'update';
                break;
            case 'DELETE':
                return 'delete';
                break;
            default:
                return null;
        }
    }

    public function setHeaders(){
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $this->status . " " . $this->requestStatus($this->status));
    }
}