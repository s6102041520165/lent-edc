<?php

use yii\db\Migration;

/**
 * Class m200212_112821_init_rbac
 */
class m200212_112821_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "Employee" permission
        /**------------Employee-----------** */
        $createEmployee = $auth->createPermission('createEmployee');
        $createEmployee->description = 'Create an employee';
        $auth->add($createEmployee);

        $deleteEmployee = $auth->createPermission('deleteEmployee');
        $deleteEmployee->description = 'Create an employee';
        $auth->add($deleteEmployee);

        $editEmployee = $auth->createPermission('editEmployee');
        $editEmployee->description = 'Create an employee';
        $auth->add($editEmployee);

        $viewEmployee = $auth->createPermission('viewEmployee');
        $viewEmployee->description = 'View an employee';
        $auth->add($viewEmployee);

        // add "Card" permission
        /**-----------Edc----------- */
        $createEdc = $auth->createPermission('createEdc');
        $createEdc->description = 'Create a Edc';
        $auth->add($createEdc);

        $editEdc = $auth->createPermission('editEdc');
        $editEdc->description = 'Create a Edc';
        $auth->add($editEdc);

        $deleteEdc = $auth->createPermission('deleteEdc');
        $deleteEdc->description = 'Create a Edc';
        $auth->add($deleteEdc);

        $viewEdc = $auth->createPermission('viewEdc');
        $viewEdc->description = 'View a Edc';
        $auth->add($viewEdc);

        // add "Card" permission
        /**-----------Edc----------- */
        $createDistrict = $auth->createPermission('createDistrict');
        $createDistrict->description = 'Create a District';
        $auth->add($createDistrict);

        $editDistrict = $auth->createPermission('editDistrict');
        $editDistrict->description = 'Edit district';
        $auth->add($editDistrict);

        $deleteDistrict = $auth->createPermission('deleteDistrict');
        $deleteDistrict->description = 'Delete a district';
        $auth->add($deleteDistrict);

        $viewDistrict = $auth->createPermission('viewDistrict');
        $viewDistrict->description = 'View a district';
        $auth->add($viewDistrict);

        /**-----------Lent Edc--------------* */

        $lentEdc = $auth->createPermission('lentEdc');
        $lentEdc->description = 'Lent a Edc';
        $auth->add($lentEdc);

        // add "employee" role and give this role the "createEmployee" permission
        $employee = $auth->createRole('employee');
        $auth->add($employee);
        $auth->addChild($employee, $createEdc);
        $auth->addChild($employee, $editEdc);
        $auth->addChild($employee, $deleteEdc);
        $auth->addChild($employee, $viewEdc);
        $auth->addChild($employee, $lentEdc);
        $auth->addChild($employee, $viewDistrict);
        $auth->addChild($employee, $createEmployee);
        $auth->addChild($employee, $editEmployee);
        $auth->addChild($employee, $viewEmployee);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteEmployee);
        $auth->addChild($admin, $deleteDistrict);
        $auth->addChild($admin, $editDistrict);
        $auth->addChild($admin, $createDistrict);
        $auth->addChild($admin, $employee);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($employee, 2);
        $auth->assign($admin, 1);
    }
    
    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200212_112821_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
