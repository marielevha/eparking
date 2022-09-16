<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize roles and permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Database Begin: init roles an permissions');
        $actions = ['read', 'write', 'delete', 'restore'];
        $models = [
            'user'
        ];

        /**
         * Creation of permissions
         */
        $this->comment('CREATION OF PERMISSIONS');
        $progress1 = $this->output->createProgressBar(count($models) * count($actions));
        $i = 0;
        while ($i < count($models) * count($actions)) {
            foreach ($models as $model) {
                foreach ($actions as $action) {
                    Permission::create(['name' => "$model.$action"]);
                    //$this->info("Create permission: ``$model.$action``");
                    $i++;
                    $progress1->advance();
                }
            }
        }

        /**
         * Creation of roles & assignment of permissions to different roles
         */
        $this->comment('CREATION OF ROLES & ASSIGNMENT OF PERMISSIONS ROLES');
        $progress2 = $this->output->createProgressBar(5);
        Role::create(['name' => env('PROFILE_CUSTOMER')])
            ->givePermissionTo([
                'user.read', 'user.write', 'user.delete'
            ]);
        $progress2->advance();



        Role::create(['name' => env('PROFILE_ADMIN')])
            ->givePermissionTo([
                'user.read', 'user.write', 'user.delete',
            ]);
        $progress2->advance();

        Role::create(['name' => env('PROFILE_SUPER_ADMIN')])
            ->syncPermissions(Permission::all());
        $progress2->advance();
        $progress2->finish();
        $this->comment(' DONE. ' . PHP_EOL);

        /**
         * Assigning super-admin and admin roles to users
         */
        $this->comment('ASSIGNING SUPER-ADMIN AND ADMIN ROLES TO USERS');
        $progress3 = $this->output->createProgressBar(4);
        User::find(1)->assignRole(env('PROFILE_SUPER_ADMIN'));
        $progress3->advance();
        $this->info(' Assign role: Assign ``' . env('PROFILE_SUPER_ADMIN') . '`` role to ' . User::find(1)->name);

        User::find(2)->assignRole(env('PROFILE_ADMIN'));
        $progress3->advance();
        $this->info(' Assign role: Assign ``' . env('PROFILE_ADMIN') . '`` role to ' . User::find(2)->name);
    }
}
