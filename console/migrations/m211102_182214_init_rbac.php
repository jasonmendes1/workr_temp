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

        $openBackend = $auth->createPermission('openBackend');
        $openBackend->description = 'Open Backend';
        $auth->add($openBackend);

        // adiciona a permissão "createEmpresa"
        $createEmpresa = $auth->createPermission('createEmpresa');
        $createEmpresa->description = 'Criar uma empresa';
        $auth->add($createEmpresa);

        // adiciona a permissão "updateEmpresa"
        $updateEmpresa = $auth->createPermission('updateEmpresa');
        $updateEmpresa->description = 'Update empresa';
        $auth->add($updateEmpresa);
        
        // adiciona a permissão  "deleteEmpresa"
        $deleteEmpresa = $auth->createPermission('deleteEmpresa');
        $deleteEmpresa->description = 'Delete Empresa';
        $auth->add($deleteEmpresa);

        $verPerfil = $auth->createPermission('verPerfil');
        $verPerfil->description = 'Ver o próprio perfil';
        $auth->add($verPerfil);

        $verDisputas = $auth->createPermission('verDisputas');
        $verDisputas->description = 'Ver disputas entre o contratante e o administrador (Reports)';
        $auth->add($verDisputas);

        $resolverDisputas = $auth->createPermission('resolverDisputas');
        $resolverDisputas->description = 'Resolve as disputas entre o contratante e o administrador (Reports)';
        $auth->add($resolverDisputas);

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
        $auth->addChild($admin, $contratante);
        $auth->addChild($admin, $prestador);
        $auth->addchild($admin, $openBackend);
        $auth->addchild($admin, $verDisputas);
        $auth->addchild($admin, $resolverDisputas);
        $auth->addChild($contratante, $createEmpresa);
        $auth->addChild($contratante, $updateEmpresa);
        $auth->addChild($contratante, $deleteEmpresa);
        $auth->addChild($prestador, $verPerfil);
        $auth->addChild($contratante, $verPerfil);


        // Atribui roles para usuários. 1 and 2 são IDs retornados por IdentityInterface::getId()
        // normalmente implementado no seu model User.
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
    
}
