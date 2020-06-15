<?

namespace SB\Cars\Rest;

abstract class AbstractModelApi
{
    protected $params = [
        'order'=>[],
        'filter'=>[],
        'select'=>['*'],
        'limit'=>0
    ];

    /**
     * AbstractModelApi constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        $this->params['order'] = $params['order']??[];
        $this->params['filter'] = $params['filter']??[];
        $this->params['select'] = $params['select']??['*'];
        $this->params['limit'] = $params['limit']??0;
    }

    abstract public function get(): array;
    abstract public function create(): array;
    abstract public function update(): array;
    abstract public function delete(): array;
}