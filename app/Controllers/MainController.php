<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use App\Models\MainModel2;

class MainController extends BaseController
{

    public function save()
    { 
        $main = new MainModel();
        $m = new MainModel2();
        $ID = $this->request->getPost('ID');
        $data = [
            'StudName' => $this->request->getPost('StudName'),
            'StudGender' => $this->request->getPost('StudGender'),
            'StudCourse' => $this->request->getPost('StudCourse'),
            'StudSection' => $this->request->getPost('StudSection'),
            'StudYear' => $this->request->getPost('StudYear'),
        ];

        if(isset($ID)){
            $main->set($data)->where('ID', $ID)->update();
        }else{
            $main->save($data);
        }
        return redirect()->to('/test');
    }

    public function delete($ID)
    {
        $main = new MainModel();
        $main->delete($ID);
        return redirect()->to('/test');
    }

    public function test()
    {
        $j = new MainModel();
        $k = new MainModel2();
        $data= [
            'main' => $j->findAll(),
            'k' => $k->findAll(), 
    ]; 

        //var_dump(data);
        return view('main', $data);
    }

    public function updates()
    { 
        $data = [
            'StudID' => $this->request->getPost('StudID'),
            'StudName' => $this->request->getPost('StudName'),
            'StudGender' => $this->request->getPost('StudGender'),
            'StudCourse' => $this->request->getPost('StudCourse'),
            'StudSection' => $this->request->getPost('StudSection'),
            'StudYear' => $this->request->getPost('StudYear'),
        ];
        $main = new MainModel();
        $main->set($data)->where('ID', $ID)->update();
        return redirect()->to('/test');
    }

    public function update($ID)
    {
        $main = new MainModel();
        $k = new MainModel2();
        $data = [
            'd'=> $main->where ('ID',$ID)->first(),
            'main'=> $main-> findAll(),
            'k' => $k->findAll(), 
        ];
        return view('main', $data);
    }

}