<?php

return [
    'user' => [
        'success' => [
            'store' => 'Salvo com sucesso.',
            'update' => 'Atualizado com sucesso.',
            'destroy' => 'Removido com sucesso.',
        ],
        'error' => [
            'store' => 'Erro tentar salvar o usuário.',
            'update' => 'Erro tentar atualizar o usuário.',
            'destroy' => 'Erro tentar remover o usuário.',
            'not-user' => 'Usuário não existe.',
            'admin' => [
                'destroy' => 'Usuário do tipo admin, não pode ser removido.',
            ]
        ]
    ],

    'unit' => [
        'success' => [
            'store' => 'Salvo com sucesso.',
            'update' => 'Atualizado com sucesso.',
            'destroy' => 'Removido com sucesso.',
        ],

        'error' => [
            'store' => 'Erro tentar salvar.',
            'update' => 'Erro tentar atualizar.',
            'destroy' => 'Erro tentar remover.',
            'not-user' => 'Unidade não existe.',
            'linked-user' => 'Unidade não pode ser removida. Existe usuário vinculado a unidade.',
            'linked-unit-location' => 'Essa unidade esta vinculada a um local de unidade.',

        ]
    ],
    'unit-location' => [
        'success' => [
            'store' => 'Salvo com sucesso.',
            'update' => 'Atualizado com sucesso.',
            'destroy' => 'Removido com sucesso.',
        ],
        'error' => [
            'store' => 'Erro tentar salvar.',
            'update' => 'Erro tentar atualizar.',
            'destroy' => 'Erro tentar remover. Entre em contato com suporte.',
            'not-unit-location' => 'Local de unidade não existe.',
            'linked-unit' => 'Local de unidade não pode ser removida. Existe unidade vinculado.',
            'linked-equipment' => 'Local de unidade não pode ser removida. Existe equipamento vinculado.',

        ]
    ],

    'abnormalities' => [
        'success' => [
            'store' => 'Salvo com sucesso.',
            'update' => 'Atualizado com sucesso.',
            'destroy' => 'Removido com sucesso.',
        ],
        'error' => [
            'store' => 'Erro tentar salvar.',
            'update' => 'Erro tentar atualizar.',
            'destroy' => 'Erro tentar remover. Entre em contato com suporte.',
            'not-abnormalitie' => 'Anormalidade não existe.',

        ]
    ],
    'road-map' => [
        'success' => [
            'store' => 'Salvo com sucesso.',
            'update' => 'Atualizado com sucesso.',
            'destroy' => 'Removido com sucesso.',
        ],
        'error' => [
            'store' => 'Erro tentar salvar.',
            'update' => 'Erro tentar atualizar.',
            'destroy' => 'Erro tentar remover. Entre em contato com suporte',
            'not-road-map' => 'Roteiro não existe',

        ]
    ],

    'item-local' => [
        'error' => [
            'linked-phase' => 'Local item não pode ser removido. Existe Etapa vinculado.',

        ]
    ],
    'equipments' => [
        'error' => [
            'linked-item-local' => 'Equipamento não pode ser removido. Existe Item local vinculado.',

        ]
    ],

    // padrão
    'success' => [
        'store' => 'Salvo com sucesso.',
        'update' => 'Atualizado com sucesso.',
        'destroy' => 'Removido com sucesso.',
    ],
    'error' => [
        'store' => 'Erro tentar salvar.',
        'update' => 'Erro tentar atualizar.',
        'destroy' => 'Erro tentar remover. Entre em contato com suporte',
        'not-result' => 'Nenhum resultado de consulta para o modelo',

    ]
];
