<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    |--------------------------------------------------------------------------
    */

    'backend' => [
        'roles' => [
            'created' => 'O papel foi criado com sucesso.',
            'updated' => 'O papel foi atualizado com sucesso.',
            'deleted' => 'O papel foi excluído com sucesso.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'O aplicativo está configurado para aprovar manualmente os usuários.',
            'confirmation_email'       => 'Uma nova confirmação de e-mail será enviada.',
            'confirmed'                => 'O usuário foi confirmado com sucesso.',
            'created'                  => 'O usuário foi criado com sucesso.',
            'deleted'                  => 'O usuário foi excluído com sucesso.',
            'deleted_permanently'      => 'O usuário foi excluídodo permanentemente.',
            'restored'                 => 'O usuário foi restaurado com sucesso.',
            'session_cleared'          => 'A sessão do usuário foi eliminada com sucesso.',
            'social_deleted'           => 'Conta social removida com sucesso.',
            'unconfirmed'              => 'O usuário não foi confirmado com sucesso.',
            'updated'                  => 'O usuário foi atualizado com sucesso.',
            'updated_password'         => 'A senha do usuário foi atualizada com sucesso.',
        ],

        'categories' => [
            'created'             => 'A categoria foi criada com sucesso.',
            'deleted'             => 'A categoria foi excluída com sucesso.',
            'updated'             => 'A categoria foi atualizada com sucesso.',
        ],

        'products' => [
            'created'             => 'O produto foi criado com sucesso.',
            'deleted'             => 'O produto foi excluído com sucesso.',
            'deleted_permanently' => 'O produto foi excluídodo permanentemente.',
            'restored'            => 'O produto foi restaurado com sucesso.',
            'updated'             => 'O produto foi atualizado com sucesso.',
        ],

        'depositions' => [
            'created'             => 'O depoimento foi criado com sucesso.',
            'deleted'             => 'O depoimento foi excluído com sucesso.',
            'updated'             => 'O depoimento foi atualizado com sucesso.',
        ],

        'images' => [
            'created'             => 'A imagem foi criada com sucesso.',
            'deleted'             => 'A imagem foi excluída com sucesso.',
            'updated'             => 'A imagem foi atualizada com sucesso.',
        ],

        'videos' => [
            'created'             => 'O vídeo foi criado com sucesso.',
            'deleted'             => 'O vídeo foi excluído com sucesso.',
            'updated'             => 'O vídeo foi atualizado com sucesso.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Suas informações foram enviadas com sucesso. Nós responderemos de volta ao e-mail fornecido assim que pudermos.',
        ],
    ],
];
