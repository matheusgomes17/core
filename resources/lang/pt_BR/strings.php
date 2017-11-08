<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Strings Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used in strings throughout the system.
      | Regardless where it is placed, a string can be listed here so it is easily
      | found in a intuitive way.
      |
      |--------------------------------------------------------------------------
     */

    'backend' => [
        'access' => [
            'users' => [
                'delete_user_confirm'  => 'Tem certeza de que deseja excluir este usuário permanentemente? Em algum lugar do aplicativo pode fazer referência ao id deste usuário e possivelmente pode ocasionar um erro. Prossiga por sua conta e risco. Isso não pode ser desfeito.',
                'if_confirmed_off'     => '(Se confirmado estiver desligado)',
                'restore_user_confirm' => 'Restaurar esse usuário ao seu estado original?',
            ],
        ],
        'dashboard' => [
            'title'   => 'Painel de Controle Administrativo',
            'welcome' => 'Bem-vindo',
        ],
        'general' => [
            'all_rights_reserved' => 'Todos os direitos reservados.',
            'are_you_sure'        => 'Tem certeza?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Continuar',
            'member_since'        => 'Membro desde',
            'minutes'             => ' minutos',
            'search_placeholder'  => 'Buscar...',
            'timeout'             => 'Você foi automaticamente desconectado por questão de segurança já que você estava inativo por ',
            'see_all'             => [
                'messages'      => 'Ver todas as mensagens',
                'notifications' => 'Ver todas as notificações',
                'tasks'         => 'Ver todas as tarefas',
            ],
            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],
            'you_have' => [
                'messages'      => '{0} Você não tem mensagens|{1} Você tem 1 mensagem|[2,Inf] Você tem :number mensagens',
                'notifications' => '{0} Você não tem notificações|{1} Você tem 1 notificação|[2,Inf] Você tem :number notificações',
                'tasks'         => '{0} Você não tem tarefas|{1} Você tem 1 tarefa|[2,Inf] Você tem :number tarefas',
            ],
        ],
        'search' => [
            'empty'      => 'Por favor, digite um termo de busca.',
            'incomplete' => 'Você deve escrever sua própria lógica de busca para este sistema.',
            'title'      => 'Resultados da busca',
            'results'    => 'Resultados da busca por :query',
        ],
    ],
    'emails' => [
        'auth' => [
            'account_confirmed'         => 'Sua conta foi confirmada.',
            'error'                     => 'Oops!',
            'greeting'                  => 'Olá!',
            'regards'                   => 'Nossos cumprimentos,',
            'trouble_clicking_button'   => 'Se você está com problemas para clicar no botão ":action_text", copie e cole a URL abaixo no seu navegador:',
            'thank_you_for_using_app'   => 'Obrigado por utilizar o nosso sistema!',
            'password_reset_subject'    => 'Seu link para redefinição de senha',
            'password_cause_of_email'   => 'Você recebeu este email porque nós recebemos uma solicitação de redefinição de senha para a sua conta.',
            'password_if_not_requested' => 'Se você não solicitou uma redefinição de senha, nenhuma outra ação é necessária.',
            'reset_password'            => 'Clique aqui para redefinir sua senha',
            'click_to_confirm'          => 'Clique aqui para confirmar a sua conta:',
        ],

        'contact' => [
            'email_body_title'  => 'Você tem um novo pedido de formulário de contato: abaixo estão os detalhes:',
            'subject'           => 'Uma nova inscrição no Formulário de Contato :app_name !',
        ],
    ],
    'frontend' => [
        'general' => [
            'joined' => 'Entrou',
        ],

        'user' => [
            'change_email_notice' => 'Se você alterar seu e-mail, você será desconectado até confirmar seu novo endereço de e-mail.',
            'email_changed_notice' => 'Você deve confirmar seu novo endereço de e-mail antes de poder fazer login novamente.',
            'profile_updated'  => 'Perfil atualizado com sucesso.',
            'password_updated' => 'Senha atualizada com sucesso.',
        ],
        'welcome_to' => 'Bem-vindo a :place',
    ],
];
