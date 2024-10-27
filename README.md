# 🌟 **Projeto-PetStar** 🌟

### ms_20242_g9
Repositório definido para a manutenção do controle de versão dos artefatos do projeto do Grupo 9, da disciplina de Modelagem de Software, no semestre 2024-2.

### Nome do Projeto:
PetStar - Brilho Animal

### Descrição:
Plataforma digital que simplifique a administração de cuidados e consultas para pets, conectando proprietários de animais a profissionais como tosadores e cuidadores. A plataforma possibilitará agendamentos, compras de produtos, suporte ao usuário e adoção de animais, sendo esses serviços realizados na própria loja da PetStar.

### Problema
Atualmente, muitos donos de pets enfrentam dificuldades ao interagir com pet shops. Problemas comuns incluem a falta de comunicação eficiente com os profissionais, ausência de perfis online detalhados e dificuldade em agendar serviços. Além disso, a compra de produtos para pets muitas vezes não é conveniente, pois nem todos os pet shops oferecem opções online.

### Objetivos da Solução
- Promover conforto e versatilidade aos donos de pets através de opções remotas e inovadoras para agendamento de serviços e compra de produtos.
- Facilitar a comunicação entre donos de pets e profissionais, oferecendo perfis detalhados e avaliações para garantir a qualidade dos serviços.
- Promover o bem-estar animal, conscientizando os donos sobre os cuidados necessários e oferecendo suporte contínuo.
- Incentivar a adoção responsável de animais de rua, conectando potenciais adotantes a pets tratados por profissionais.
- Garantir a satisfação do cliente através de um suporte eficiente e uma experiência de usuário intuitiva e agradável.

### Grupo
Este projeto será desenvolvido pelos componentes do grupo 9: 

| 📑 Matrícula  | 📝 Nome Completo                    | 👤 Usuário Git                                                |
|---------------|--------------------------------------|---------------------------------------------------------------|
| 202403064     | CLAUDIO ELIZIARIO SILVA FERREIRA     | [claudioferreira23](https://github.com/claudioferreira23)     |
| 202403067     | DAVID DAVES FERREIRA PINTO           | [daviddaves1](https://github.com/daviddaves1)                 |
| 202403068     | ENZO DE OLIVEIRA MACHADO             | [EnzoMachad0](https://github.com/EnzoMachad0)                 |
| 202403090     | RAFAEL FERNANDES DA SILVA            | [RafaelFernandes1112](https://github.com/RafaelFernandes1112) | 
| 202403091     | RODRIGO LUIZ FERREIRA RAMOS          | [rodrigoluizf](https://github.com/rodrigoluizf)               |

### Backlog do Produto

- **1.** - Cadastro de cliente (RF001).
- **2.** - Agendamento de serviços relacionados ao cuidado e bem-estar animal.
- **3.** - Conexão entre front-end e back-end na aplicação do projeto.
- **4.** - Perfil de usuário com informações pessoais.
- **5.** - Área de produtos dedicada ao cuidado e bem estar animal.
- **6.** - Carrinho para armazenar os produtos de cuidado e bem-estar animal.
- **7.** - Calendário integrado para a vizualização de horários para serviços.
- **8.** - Área de suporte.
- **9.** - Área para avaliação e feedbacks.

### Requisitos Funcionais

- **1. RF001** - O sistema deve ter opção de criação de conta para clientes.
- **2. RF002** - O sistema deve possuir um perfil de usuário com opções de edição, disponível para clientes.
- **3. RF003** - Na plataforma é precisa haver uma opção destinada ao cliente para agendamento de serviços com cuidado animal.
- **4. RF004** - O sistema deverá possuir calendário integrado para visualização de horários disponíveis, podendo ser acessado somente pelo cliente.
- **5. RF005** - O sistema em si deve abrigar uma área de produtos relacionados aos cuidados animais onde após serem escolhidos, devem ser direcionados para ocarrinho de compras, sendo essa opção disponível somente ao cliente.
- **6. RF006** - Na plataforma é preciso que haja uma opção dedicada à adoção de animais de rua tratados por profissionais destinada somente para clientes.
- **7. RF007** - O sistema deve conter uma área de suporte embutida que será usada para auxiliar o usuário a resolver problemas de usabilidade, sanar dúvidas, etc. A opção será disponibilizada somente para clientes.
- **8. RF008** - No software tem que haver uma opção para avaliações e feedbacks, porém será disponibilizada apenas para clientes, no intuito de verificar a satisfação dos mesmos com os serviços prestados.
- **9. RF009** - No software, tem que haver uma opção para exclusão da conta pessoal, estando essa disponível somente aos clientes.

### Requisitos Não Funcionais

- **1. RNF001** - O sistema deve ser compatível com os navegadores mais recentes, como Google Chrome, Mozilla Firefox, e Microsoft Edge.
- **2. RNF002** - O sistema deve garantir a integridade dos dados, evitando duplicações e garantindo que todas as transações sejam completadas de forma atômica.
- **3. RNF003** - A interface de usuário deve ser intuitiva e de fácil navegação, seguindo as diretrizes de design UX e UI modernas.
- **4. RNF004** - O sistema deve ser escalável, permitindo a adição de novos módulos ou funcionalidades sem a necessidade de reestruturação significativa.
- **5. RNF005** - O sistema deve ser versátil e adaptável para dispositivos móveis.
- **6. RNF006** - O sistema deve possuir integralização com banco de dados de forma automatizada, garantindo assim agilidade nas operações e processamento de dados.
- **7. RNF007** - O sistema não deve permitir a criação de conta para cliente que possua um email já existente no banco de dados.
- **8. RNF008** - O sistema só deve criar o banco de dados e suas tabelas caso ele não exista no servidor.
- **9. RFN009** - As senhas devem ser criptografadas de maneira segura.

### Regras de Negócio
1. RN001 - Um cliente só pode criar uma conta se fornecer um email único, que não esteja registrado no sistema.
2. RN002 - As senhas fornecidas pelos clientes devem ser criptografadas de maneira segura antes de serem armazenadas no banco de dados.
3. RN003 - Os clientes só podem agendar serviços em horários disponíveis, conforme o calendário integrado.
4. RN004 - Produtos só podem ser adicionados ao carrinho se estiverem em estoque, e a quantidade deve ser atualizada à medida que os itens são reservados ou removidos.
5. RN005 - Apenas clientes que finalizaram uma compra ou agendaram um serviço podem fornecer avaliações ou feedback sobre os produtos e serviços.
6. RN007 - A exclusão da conta do cliente é permanente e irreversível, removendo todos os dados associados ao perfil.
7. RN008 - O suporte ao cliente deve estar disponível a qualquer momento, e os clientes podem abrir tickets e acompanhar o status de suas solicitações.
8. RN009 - O cliente só poderá visualizar horários de serviços que ainda estão disponíveis no calendário, evitando conflitos de agendamento.
9. RN006 - O cliente pode editar suas informações pessoais no perfil.

### Modelo Arquitetural

A estrutura mais alinhada ao produto final é a do tipo Cliente-Servidor. Nesse esquema, o cliente tem a função de iniciar a interação com o servidor, que fica em estado de espera para receber solicitações e oferecer os serviços necessários. Um exemplo comum dessa arquitetura é o modelo de três camadas:

- Camada de Interface (Cliente): A interação com o usuário será implementada utilizando HTML, CSS e Java Script.
- Camada de Processamento de Regras (Servidor): Trata as solicitações vindas do cliente através de PHP.
- Camada de Banco de Dados (Servidor): Responsável por organizar e recuperar as informações usando PostgreSQL.

### Modelo de Interfaces Gráficas
<Apresentar uma descrição sucinta do modelo de interfaces gráficas do Produto.>

### Tecnologia de Persistência de Dados
<Apresentar uma descrição sucinta do modelo de persistência do Produto.>

### Local do _Deploy_
O nosso planejamento inicial é hospedar nossa aplicação no [Local a definir], sendo crucial para nossa escolha a facilidade de configuração e também os recursos ofertados na versão gratuita.

### Cronograma de Desenvolvimento

|Iteração|Descrição|Data Início|Data Fim|Responsável|Situação|
|---|---|---|---|---|---|
|1|Concepção|20/10/2024|27/09/2024|Grupo 09|Concluída|
|2|Preparação|23/10/2024|30/10/2024|Grupo 09|Concluída|
|3|Itens do backlog <1,2,3>|02/10/2024|15/10/2024|Grupo 09|Em andamento|
|4|Itens do backlog <4,5,6>|23/10/2024|03/11/2024|Grupo 09|Programada|
|5|Itens do backlog <7,8,9>|30/10/2024|12/11/2024|Grupo 09|Programada|
|6|Apresentação do Projeto|18/11/2024|26/11/2024|Grupo 09|Programada|

### Iterações x Atividades

| Iteração | Atividade                                               | Início      | Fim        | Responsável | Status                   |
|----------|---------------------------------------------------------|-------------|------------|-------------|--------------------------|
| 0        | Definição do grupo de trabalho                          | 30/08/2024  | 05/09/2024 | Grupo 09    | Concluída                |
| 0        | Definição do Tema do Trabalho                           | 30/08/2024  | 05/09/2024 | Grupo 09    | Concluída                |
| 1        | Definição do Backlog do produto                         | 03/09/2024  | 10/09/2024 | Grupo 09    | Concluída                |
| 1        | Descrição dos itens do backlog do produto               | 20/10/2024  | 28/10/2024 | Grupo 09    | Em andamento             |
| 2        | Especificação de Histórias de Usuário                   | 23/10/2024  | 01/11/2024 | Grupo 09    | Em andamento             |
| 2        | Distribuição dos itens do backlog entre as iterações    | 23/10/2024  | 01/11/2024 | Grupo 09    | Programada               |
| 3        | Definição do modelo arquitetural                        | 23/10/2024  | 01/11/2024 | Grupo 09    | Concluída                |
| 3        | Diagrama de classes dos itens do backlog <1,2>          | 02/11/2024  | 09/11/2024 | Grupo 09    | Programada               |
| 3        | Diagrama de interação/sequência dos itens do backlog <1,2>| 09/11/2024 | 15/11/2024 | Grupo 09    | Desnecessário            |
| 3        | Projeto de Interfaces gráficas dos itens do backlog <1,2>| 04/11/2024 | 10/11/2024 | Grupo 09    | Parcialmente concluída   |
| 3        | Implementação dos itens do backlog <1,2,3>              | 04/11/2024  | 10/11/2024 | Grupo 09    | Parcialmente concluída   |
| 4        | Diagrama de classes dos itens do backlog <4,5,6>        | 05/11/2024  | 11/11/2024 | Grupo 09    | Programada               |
| 4        | Diagrama de interação/sequência dos itens do backlog <4,5,6>| 05/11/2024| 13/11/2024 | Grupo 09    | Programada               |
| 4        | Projeto de Interfaces gráficas dos itens do backlog <4,5,6>| 05/11/2024| 13/11/2024 | Grupo 09    | Em andamento             |
| 4        | Projeto de persistência dos itens do backlog <4,5,6>    | 05/11/2024  | 13/11/2024 | Grupo 09    | Em andamento             |
| 4        | Implementação dos itens do backlog <4,5,6>              | 07/11/2024  | 15/11/2024 | Grupo 09    | Em andamento             |
| 5        | Diagrama de classes dos itens do backlog <7,8,9>        | 07/11/2024  | 15/11/2024 | Grupo 09    | Programada               |
| 5        | Diagrama de interação/sequência dos itens do backlog <7,8,9>| 07/11/2024| 15/11/2024 | Grupo 09    | Programada               |
| 5        | Projeto de Interfaces gráficas dos itens do backlog <7,8,9>| 07/11/2024| 15/11/2024 | Grupo 09    | Programada               |
| 5        | Projeto de persistência dos itens do backlog <7,8,9>    | 10/11/2024  | 17/11/2024 | Grupo 09    | Programada               |
| 5        | Implementação dos itens do backlog <7,8,9>              | 10/11/2024  | 17/11/2024 | Grupo 09    | Programada               |
| 6        | Apresentação do Projeto                                 | 18/11/2024  | 26/11/2024 | Grupo 09    | Programada               |