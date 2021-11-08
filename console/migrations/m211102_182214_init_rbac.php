<?php

use yii\db\Migration;

/**
 * Class m211102_182214_init_rbac
 */
class m211102_182214_init_rbac extends Migration
{
   
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        // adiciona a permissão "createPost"
        $createEmpresa = $auth->createPermission('createEmpresa');
        $createEmpresa->description = 'Criar uma empresa';
        $auth->add($createEmpresa);

        // adiciona a permissão "updatePost"
        $updateEmpresa = $auth->createPermission('updateEmpresa');
        $updateEmpresa->description = 'Update empresa';
        $auth->add($updateEmpresa);
        
        // adiciona a permissão  "deleteCargo"
        $deleteEmpresa = $auth->createPermission('deleteEmpresa');
        $deleteEmpresa->description = 'Delete Empresa';
        $auth->add($deleteEmpresa);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createEmpresa);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('prestador');
        $auth->add($author);
        $auth->addChild($author, $createEmpresa);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $contratante = $auth->createRole('contratante');
        $prestador = $auth->createRole('prestador');
        $guest = $auth->createRole('guest');
        $auth->add($admin);
        $auth->add($contratante);
        $auth->add($guest);
        $auth->add($prestador);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $deleteEmpresa);
        $auth->addChild($contratante, $createEmpresa);
        $auth->addChild($contratante, $updateEmpresa);
        $auth->addChild($prestador, $createEmpresa);


        // Atribui roles para usuários. 1 and 2 são IDs retornados por IdentityInterface::getId()
        // normalmente implementado no seu model User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
    
}
