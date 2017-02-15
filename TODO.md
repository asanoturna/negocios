GERAL
--------------------

Criar coluna remember
ALTER TABLE `mod_task_list` ADD `remember` DATE NOT NULL AFTER `deadline`;
ALTER TABLE `mod_task_list` ADD `notification_remember` INT NOT NULL DEFAULT '0' AFTER `notification_deadline_date`, ADD `notification_remember_date` DATE NULL AFTER `notification_remember`;

Add no cron nova acao
REMOVER MailQueue table

Sobre querys
http://stackoverflow.com/questions/26894987/get-count-in-relation-table-in-yii2-activerecord
https://github.com/yiisoft/yii2/issues/2179

Alterar nome das tabelas secundarias (módulos) com prefixo MOD
Criação de menus
Parametros no banco de dados (extensão)
*** http://stackoverflow.com/questions/28219440/init-application-component-with-config-from-database
Bloquear uso do IE versão 8 pra baixo
Melhor desempenho dos icones FONT AWESOME (otimizar assets, css, js, etc).
Otimizar para dispositivos móveis (gridview, menus mal posicionados, etc) !!!

Criar Área de Alertas (local mais visivel no top da intranet)
Criar Área de Notícias (incluir curtidas e comentários)
Criar Agenda / Calendario (global e para cada usuario) (sinc google agenda ?)
Criar Galeria de Fotos
Criar Área de Links Pessoais
Criar Links Externos/Ferramentas ??? (calculadora HP 12c, etc..)

MÓDULOS
--------------------
- Migração da ferramenta de Apoio Cadastro
- Terminar módulo Arquivos (estrutra semelhante a central, incluir Planilha Base e intranet antiga)
- Criar módulo Vídeos
- Criar módulo RH (area p/ contra cheque)
- Criar módulo Helpdesk
- Criar módulo Plano de Ação (igual do GMI)

- Usuarios -> Notas pessoais
- Usuarios -> Links
- Usuarios -> Agenda Pessoal (lembretes, notificacoes)

Visitas -> Verificar / Usar plugin de galeria de fotos
Visitas -> Ilimitado numero de upload de fotos
Visitas -> Edição de Imagens (cortar, girar, etc).

Produtividade -> Gravar Formula/Cálculo
Produtividade -> Filtro por período no ranking
Produtividade -> Quadro Metas por agência (cadastrar metas por local para todos os produtos)
  ---> Exemplo.: tabela meta > valor, pa, data(m/y)
Produtividade -> Regras dinamicas
Produtividade -> Gerenciar Produtos (cadastrar, ativar, desativar, etc), Gerenciar Metas