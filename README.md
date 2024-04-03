### BANCO DE DADOS

Modelagem Conceitual, logica e fisica de armazenamento em banco de dados, de um Pedido genérico, contendo Produtos feito por um Cliente.

Entrega PDF|JPG, arquivo sql.

### Programação e Orientação a Objetos

Desenvolver uma aplicação que deve consumir os serviços REST listado abaixo. O desenvolvimento da aplicação deve ser todo orientado a objetos fortemente tipados. Modelar e replicar os objetos obtidos através do consumo das apis.

* Não utilizar frameworks ou bibliotecas complexas.

* Opcional, produzir o desenvolvimento do armazenamento local ( CRUD ).


#### REST

Orientações

* Necessario obter um TOKEN de autenticação
* Requisições POST, devolvem o ID do registro salvo
* Metodos POST E PUT compartilham do mesmo body
* Metodos GET PUT DELETE, devem conter na respectiva URL /{ID}
* Requisições GET sem /{ID}, retorna a lista de registros

* HOST https://dev.elaboresistemas.com.br/test-dev-php
* Autenticação responsavel por obter o TOKEN, requer um POST Authorization: Basic BASE64 = USUARIO:password
* password, deve ser aplicado md5
* Demais endpoints, requer autorização Authorization: Bearer TOKEN

* publicar codigo fonte em repositorio publico GITHub ou outro de preferencia

##### Autenticação - responsavel por obter o BEARER_TOKEN
POST HOST/api/autenticacao/login
Authorization: Basic {BASE64}

### CLIENTES
GET HOST/api/clientes
GET HOST/api/clientes/{CLIENTE_ID}

POST HOST/api/clientes
PUT  HOST/api/clientes/{CLIENTE_ID}

{
    "NOME"          => "string_1_50",
    "CIDADE_NOME"   => "string_1_50"
}

DELETE HOST/api/clientes/{CLIENTE_ID}

### PRODUTOS

GET HOST/api/produtos
GET HOST/api/produtos/{PRODUTO_ID}

POST HOST/api/clientes
PUT  HOST/api/clientes/{PRODUTO_ID}

{
    "NOME"          => "string_1_50",
    "VLRUNIT"       => "number_1_10_2"
}

DELETE HOST/api/clientes/{PRODUTO_ID}

### PEDIDOS

GET HOST/api/pedidos
GET HOST/api/pedidos/{PEDIDO_ID}

POST HOST/api/pedidos
PUT  HOST/api/pedidos/{PEDIDO_ID}

{
    "CLIENTE_ID" => "number_1",
    "itens"   => [{
        "PRODUTO_ID"    => "number_1",
        "VLRUNIT"       => "number_1_10_2",
        "QUANTIDADE"    => "number_1"
    }]
}

DELETE HOST/api/pedidos/{PEDIDO_ID}