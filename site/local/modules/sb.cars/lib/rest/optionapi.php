<?

namespace SB\Cars\Rest;

use Bitrix\Main\DB\Exception;
use SB\Cars\Model\Option;

class OptionApi extends AbstractModelApi
{
    protected $params = '';

    public function get(): array{
        try {
            $data = Option::getList();
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