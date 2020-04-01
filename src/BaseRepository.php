<?php

namespace Ineplant;

trait BaseRepository
{

    protected $model;

    public static $unique;

    public function getModel() {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function newModel() {
        return resolve(get_class($this->model));
    }

    /**
     * 通过主键获取数据如果主键不存在则抛出一个404
     *
     * @param $id
     * @return mixed
     */
    public function getById($id, $status = true, $lock = false) {
        $query = $this->model;

        $lock && $query = $query->lockForUpdate();

        if ($status) {
            return $query->findOrFail($id);
        } else {
            return $query->find($id);
        }

    }

    /**
     * 保存数据
     *
     * @param $input
     * @return mixed
     */
    public function store($input) {
        return $this->save($this->newModel(), $input);
    }

    /**
     * 批量更新数据
     *
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($where, $input) {
        return $this->model->where($where)->update($input);
    }


    /**
     * 通过id更新数据
     *
     * @param mixed $id
     * @param array $input
     * @return mixed
     */
    public function updateById($id, $input) {

        if (is_array($id)) {
            return $this->model->whereIn('id', $id)->update($input);
        } else {
            return $this->update(['id' => $id], $input);
        }

    }

    /**
     * 更新数据
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
     * 删除数据
     *
     * @param mixed $mixed int或者model
     * @return mixed
     */
    public function destroy($mixed) {
        if (ctype_digit($mixed) || is_string($mixed))
            return $this->getById($mixed)->delete();
        else
            return $mixed->delete();
    }


    /**
     * 返回列表不分页
     *
     * @param bool $where
     * @param string $sortColumn
     * @param string $sort
     * @return mixed
     */
    public function lists($where = false, $sortColumn = 'id', $sort = 'desc') {

        if ($where) {
            return $this->model->where($where)->orderBy($sortColumn, $sort)->get();
        } else {
            return $this->model->orderBy($sortColumn, $sort)->get();
        }
    }


    /**
     * @param $id
     * @param null $unique
     * @param bool $status
     * @param bool $lock
     * @return mixed
     */
    public function getByUniqueId($id, $unique = null, $status = true, $lock = false) {
        $unique = $unique ?? self::$unique;

        $query = $this->model;

        $lock && $query = $query->lockForUpdate();

        $query = $query->where($unique, $id);

        if ($status) {
            return $query->firstOrFail();
        } else {
            return $query->first();
        }
    }


    /**
     * @param $id
     * @param null $unique
     * @param $input
     * @return mixed
     */
    public function updateByUniqueId($id, $input, $unique = null) {
        $unique = $unique ?? self::$unique;

        if (is_array($id)) {
            return $this->model->whereIn($unique, $id)->update($input);
        } else {
            return $this->update([$unique => $id], $input);
        }

    }

    /**
     * 返回分页列表
     *
     * @param int $pagesize
     * @param string $sort
     * @param string $sortColumn
     * @return mixed
     */
    public function page($where = false, $offset = 0, $limit = 20, $sortColumn = 'created_at', $sort = 'desc') {

        if ($where) {
            if ($sortColumn != 'created_at') {
                $query = $this->model->where($where)
                    ->orderBy($sortColumn, $sort)
                    ->orderBy('created_at', 'desc');
            } else {
                $query = $this->model->where($where)
                    ->orderBy($sortColumn, $sort);
            }
        } else {
            $query = $this->model->orderBy($sortColumn, $sort);
        }


        $total = $query->count();

        $data = $query->limit($limit)->offset($offset)->get();

        return [
            'data'  => $data,
            'total' => $total
        ];

    }

    /**
     * 返回分页列表
     *
     * @param $where
     * @param string $sort
     * @param string $sortColumn
     * @return mixed
     */
    public function listByLimit($where = false, $sortColumn = 'id', $sort = 'desc') {
        if ($where) {
            if ($sortColumn != 'id') {
                $query = $this->model->where($where)
                    ->orderBy($sortColumn, $sort)
                    ->orderBy('id', 'desc');
            } else {
                $query = $this->model->where($where)
                    ->orderBy($sortColumn, $sort);
            }
        } else {
            $query = $this->model->orderBy($sortColumn, $sort);
        }

        return $this->pageRes($query);
    }

    /**
     * 查询语句 添加分页查询
     *
     * @param $query
     * @return mixed
     */
    public function doQueryPaged($query) {
        list($offset, $limit) = Helper::pageParam();
        if (-1 == $limit) {
            return $query->get();
        }
        return $query->offset($offset)->limit($limit)->get();
    }

    /**
     * 根据$query语句 返回分页的列表格式数据
     *
     * @param $query
     * @return array
     */
    public function pageRes($query) {
        $count = $query->count();
        return Helper::listRes($count, $count ? $this->doQueryPaged($query) : []);
    }

    /**
     * 添加数据支持批量添加
     *
     * @param $input
     * @return mixed
     */
    public function insert($input) {
        return $this->model->insert($input);
    }

}