<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $polices = config("polices");
       
       foreach($polices as $policy){
        $this->makePermission($policy);
       }
    }

    public function makePermission($policy): void
    {
        $permissionTypes = [
            "view_any_",
            "view_",
            "create_",
            "update_",
            "delete_",
            "delete_any_",
            "replicate_",
            "reorder_",
        ];

       foreach($permissionTypes as $type){
        Permission::firstOrCreate(["name"=>$type.$policy,"guard_name"=>"web"]);
    }
}

}
