<?

namespace SB\Cars\Rest;

use Bitrix\Main\DB\Exception;
use SB\Cars\Model\Car;

class CarApi extends AbstractModelApi
{
    public function get(): array{
        try {
            $data = Car::getList($this->params['order'], $this->params['filter'], $this->params['select'], $this->params['limit']);
            return [$data, 200];
        }catch (Exception $e){
            return ['Error', 500];
        }

    }
    public function create(): array{
        return ['Create', 200];
    }
    public function update(): array{
        return ['Update', 200];
    }
    public function delete(): array{
        return ['Delete', 200];
    }
}