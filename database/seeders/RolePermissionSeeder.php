<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsDatas = [
            ['name' => 'training', 'group' => 'training'],
            ['name' => 'manage_training', 'group' => 'training'],
            ['name' => 'application', 'group' => 'training'],
            ['name' => 'apply_training', 'group' => 'training'],
            ['name' => 'certificate', 'group' => 'training'],

            ['name' => 'budget_bibaran', 'group' => 'budget_bibaran'],
            
            //suchana
            ['name' => 'samachar', 'group' => 'prakashan'],
            ['name' => 'notice', 'group' => 'prakashan'],
            ['name' => 'scheme', 'group' => 'prakashan'],
            ['name' => 'karyabidhi', 'group' => 'prakashan'],
        
            //pratibedan
            ['name' => 'prashikshan_pratibedan', 'group' => 'pratibedan'],
            ['name' => 'aabedan_pratibedan', 'group' => 'pratibedan'],
           
            // File permissions
            ['name' => 'view_private_file','group'=>'file_management'],
            
            // Aadharbhut Bibaran
            ['name' => 'karmachari', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'department', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'category', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'education_level', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'broadcast', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'preference', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'target_group', 'group' => 'aadharbhut_bibaran'],
          
            ['name' => 'about_us', 'group' => 'aadharbhut_bibaran'],
            
            ['name' => 'banner', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'gallery', 'group' => 'aadharbhut_bibaran'],
            ['name' => 'contact_us', 'group' => 'aadharbhut_bibaran'],

            
            // user management
            ['name' => 'prayogkarta_darta', 'group' => 'prayogkarta'],
            ['name' => 'prayogkarta_bhumika', 'group' => 'prayogkarta'],
            
            // Master setup permissions
            ['name' => 'palika_setup', 'group' => 'master_setup'],
            ['name' => 'arthik_barsha', 'group' => 'master_setup'],
            ['name' => 'province', 'group' => 'master_setup'],
            ['name' => 'district', 'group' => 'master_setup'],
            ['name' => 'sthaniya_taha', 'group' => 'master_setup'],
            ['name' => 'ward', 'group' => 'master_setup'],
            
        ];

        foreach ($permissionsDatas as $permissionData) {
            Permission::create([
                'name' => $permissionData['name'], 
                'group' => $permissionData['group'],
                'guard_name' => 'web'
            ]);
        }

        // Create roles and assign permissions
        
        // 1. Super Admin - gets all permissions
        $superAdminRole = Role::create(['name' => 'super-admin', 'guard_name' => 'web']);
        $superAdminRole->givePermissionTo(Permission::all());
        
        // 2. Admin - gets most permissions
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(Permission::all());
        
        // 3. Shakha - gets most permissions
        $adminRole = Role::create(['name' => 'shakha', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(Permission::all());

        // 4. Trainer - gets most permissions
        $adminRole = Role::create(['name' => 'trainer', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(Permission::all());
        
        // 5. Trainee - gets most permissions
        $adminRole = Role::create(['name' => 'trainee', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(
            ['name' => 'training', 'group' => 'training'],
            ['name' => 'application', 'group' => 'training'],
            ['name' => 'apply_training', 'group' => 'training'],
        );
        
       
    }
}
