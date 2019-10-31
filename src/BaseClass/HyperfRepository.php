<?php


namespace Ineplant\BaseClass;


use Hyperf\DbConnection\Db;
use Hyperf\DbConnection\Model\Model;
use Hyperf\HttpServer\Request;
use Hyperf\Utils\Str;
use Ineplant\Exceptions\ReturnException;
use Ineplant\Helper;

class HyperfRepository {

    /**
     * @var Model
     */
    protected $model;

    /**
     * HyperfRepository constructor.
     *
     * @throws ReturnException
     */
    public function __construct() {
        //注入model
        if (empty($this->model)) {
            $modelName = self::getModelClass();
            try {
                $this->model = make($modelName);
            } catch (\Exception $e) {
                throw new ReturnException("$modelName not exist");
            }
        }
    }

    /**
     * 根据 仓库类名获取对应的model类名
     */
    private static function getModelClass() {
        $arr = explode( '\\', static::class);
        return '\App\Model\\'.Str::replaceLast('Repository', '', end($arr));
    }

    /**
     * @return \Hyperf\Database\Model\Builder
     */
    protected function query() {
        return $this->model->query();
    }

    /**
     * 简单单条查询
     * @param $val
     * @param string $field
     * @return \Hyperf\Database\Model\Builder|\Hyperf\Database\Model\Model|object|null
     */
    public function getByVal($val, $field = 'id') {
        return $this->query()->where($field, $val)->first();
    }

    /**
     * 简单多条查询
     * @param array $condition
     * @return \Hyperf\Database\Model\Builder[]|\Hyperf\Database\Model\Collection
     */
    public function getByCondition($condition) {
        return $this->query()->where($condition)->get();
    }

    /**
     * 表的批量更新(旧的更新,去除的删掉,新的添加
     *
     * @param array $data 新的数据
     * @param array|bool $delCondetion 删除条件
     * @param string $idKey 主键key,用于判断更新或添加
     * @param array $addData 新增记录时添加的额外数据
     */
    public function batchUpdate($data, $delCondetion = false, $idKey = 'id', $addData = []) {
        Db::transaction(function () use ($data, $delCondetion, $idKey, $addData){
            $insertData = [];
            $updateIds  = [];
            foreach ($data as $datum) {
                if (empty($datum[$idKey])) {
                    $insertData[] = $addData ? array_merge($addData, $datum) : $datum;
                } else {
                    $updateIds[] = $datum[$idKey];
                    //更新
                    $this->query()->where($idKey, $datum[$idKey])->update($datum);
                }
            }
            //删除
            $this->query()->where($delCondetion)->whereNotIn($idKey, $updateIds)->delete();
            //新增
            $this->insert($insertData);
        });
    }

    /**
     * 简单单条查询
     * @param $val
     * @param string $field
     * @return \Hyperf\Database\Model\Builder|\Hyperf\Database\Model\Model|object|null
     */
    public function getByValOrFail($val, $field = 'id') {
        return $this->query()->where($field, $val)->firstOrFail();
    }

    /**
     * 更新
     *
     * @param $model
     * @param $input
     * @return mixed
     */
    public function save($model, $input) {
        $model->fill($input);
        $model->save();
        return $model;
    }

    /**
     * 保存数据
     *
     * @param $input
     * @return mixed
     */
    public function store($input) {
        $model = $this->model->newInstance();
        $model->fill($input);
        $model->save();
        return $model;
    }

    /**
     * 批量添加
     *
     * @param $array
     * @return bool
     */
    public function insert($array) {
        return $this->query()->insert($array);
    }

    /**
     * 批量更新数据
     *
     * @param $condition
     * @param $input
     * @return mixed
     */
    public function update($condition, $input) {
        return $this->query()->where($condition)->update($input);
    }

    /**
     * 批量删除
     *
     * @param $condtion
     * @return int|mixed
     */
    public function del($condtion) {
        return $this->query()->where($condtion)->delete();
    }

    /**
     * 指定键值批量删除
     *
     * @param $val
     * @param string $field
     * @return int|mixed
     */
    public function delByVal($val, $field = 'id') {
        return $this->query()->where([[$field, $val]])->delete();
    }

    /**
     * 根据查询条件获取列表
     *
     * @param null $condition
     * @param string|array $orderField 指定排序,($condition, 'id', 'desc') 或者 ($condition, ['id'=>'desc','create_time'=>'asc'])
     * @param string $direction
     * @param array $select 指定查询的字段
     * @return array
     */
    public function listByCondition($condition = null, $orderField = 'id', $direction = 'desc', $select = []) {
        $query = $condition ? $this->query()->where($condition)
            : $this->query();

        if (!empty($orderField)) {
            if (is_string($orderField)) {
                $orderField = [$orderField => $direction];
            }

            foreach ($orderField as $field => $direction) {
                $query->orderBy($field, $direction);
            }

        }
        if ($select) {
            $query->select($select);
        }

        return $this->pageRes($query);
    }

    /**
     * 根据$query语句 返回分页的列表格式数据
     *
     * @param \Hyperf\Database\Model\Builder $query
     * @return array
     */
    public function pageRes($query) {
        return Helper::listRes($query->count(), $this->doQueryPaged($query));
    }

    /**
     * 查询语句 添加分页查询
     *
     * @param \Hyperf\Database\Model\Builder $query
     * @return mixed
     */
    public function doQueryPaged($query) {
        $pageParam = (new Request())->inputs(['offset', 'limit']);
        $offset    = $pageParam['offset'] ?? 0;
        $limit     = $pageParam['limit'] ?? 20;
        if (-1 == $limit) {
            return $query->get();
        }
        return $query->offset($offset)->limit($limit)->get();
    }

}