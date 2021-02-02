<?php

namespace DB;

class Post extends Database
{
    protected $table_name = 'posts';
    protected  $join = [

        '[>]users' => ['u_id' => 'u_id'],
        '[>]contracts' => ['contract_id' => 'contract_id'],
        '[>]rateupdates' => ['rateupdate_id' => 'rateupdate_id'],
        '[>]cities' => ['city_id' => 'city_id'],
        '[>]items' => ['item_id' => 'item_id']


    ];

    protected $cols = [
        'posts.post_id',
        'posts.date',
        'posts.u_id',
        'users.u_name',
        'users.u_profile',
        'cities.city_name',
        'items.item_name',
        'posts.post_type',
        'contracts.contract_id',
        'contracts.price',
        'contracts.unit',
        'contracts.qty',
        'contracts.qty_unit',
        'contracts.firm1',
        'contracts.firm2',
        'rateupdates.rateupdate_id',
        'rateupdates.uprate',
        'rateupdates.downrate'


    ];

    public function show(){
        return "working";
    }

    public function findAll()
    {
        return Database::link()->select($this->table_name, $this->join, $this->cols, ["ORDER" => ["posts.post_id" => "DESC"]]);
    }

    public function find($where)
    {
        return Database::link()->select($this->table_name, $this->join, $this->cols, $where);
    }
    public function create($contract_id, $u_id, $date, $post_type, $rateupdate_id, $city_id, $item_id)
    {
        $db = Database::link();
        $r = $db->insert($this->table_name, [

            'contract_id' => $contract_id,
            'rateupdate_id' => $rateupdate_id,
            'u_id' => $u_id,
            'date' => $date,
            'post_type' => $post_type,
            'city_id' => $city_id,
            'item_id' => $item_id

        ]);
        return $db->id();
        // if ($r) {
        //     echo 200;
        // } else {
        //     echo 500;
        // }
    }
    public function update($contract_id, $u_id, $date, $post_type, $rateupdate_id, $city_id, $item_id)
    {
        $db = Database::link();
        $r = $db->update(
            $this->table_name,
            [
                'u_id' => $u_id,
                'date' => $date,
                'post_type' => $post_type,
                'city_id' => $city_id,
                'item_id' => $item_id

            ],
            [
                'contract_id' => $contract_id,
                'rateupdate_id' => $rateupdate_id
            ]
        );
        return $r->rowCount();
    }

    public function delete($id)
    {
        $db = Database::link();
        $r = $db->delete($this->table_name, ['post_id' => $id]);
        return $r->rowCount();
    }
}
