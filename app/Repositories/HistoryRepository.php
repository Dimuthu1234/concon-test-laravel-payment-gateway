<?php namespace App\Repositories;
use App\History;
use Auth;
class HistoryRepository
{
    public function getAllHistory()
    {
        return History::get();
    }
    public function getAllHistoriesByUser()
    {
        return Auth::user()->histories()->orderBy('id', 'desc')->get();
    }

    public function getHistoryCartByUser()
    {
        $histories = Auth::user()->histories()->orderBy('id', 'desc')->get();
        $carts = [];
        foreach ($histories as $history){
            $carts[] = ['carts' => unserialize($history->cart), 'history' => $history];
        }
        return $carts;
    }
//    public function storeNewCustomerRecord($request)
//    {
//        $customerRecord = new $this->model;
//        $customerRecord->create($request->input());
//        return $customerRecord;
//    }
//    public function updateExistingCustomerRecord($request, $id)
//    {
//        $customerRecord = $this->model->where('id', $id)->first();
//        $customerRecord->update($request->input());
//        return $customerRecord;
//    }
//    public function getCustomerRecordById($id)
//    {
//        return $this->model->where('id', $id)->first();
//    }
//    public function deleteCustomerRecord($id)
//    {
//        $deleteCustomer = $this->model->where('id', $id)->first();
//        $deleteCustomer->delete();
//        return $deleteCustomer;
//    }
}
