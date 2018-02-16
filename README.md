# CronDashboard

Projeto de Desenvolvimento de interface simples para a aplicação Cron

## API Doc

- [Adiconar Tarefa](#adiconar-tarefa)
- [Listar Tarefa ](#listar-tarefa)
- [Remover Tarefa](#remover-tarefa)

### Adiconar Tarefa

Esse serviço tem a finalidade de adicionar tarefas a serem executadas pelo Cron


```
GET /api/add-task.php?time=:time&task=:command

```

Parâmetros

| Name | Tipo | Descrição |
|-|-|-|
| :time | String | Min. 0-59; Hora 0-23; Dia do mês 0-31; Mês 0-12; Dias da sem. 0-6 (0 ou 7 equivalem ao domingo); * para execução contínua  [Manual Crontab](http://man7.org/linux/man-pages/man5/crontab.5.html) |
| :task | String | Script ou comando a ser executado|

<!-- | Name | Tipo | Descrição |
|-|-|-|
| Minuto | String | entre 0 a 59 minutos; * para todos os minutos |
| Hora | String | 0 a 23 horas; * para todas as horas|
| Dia do mês | String | 0 a 31; * para todos os dias|
| Mês | String |  0 a 12; * para todos os meses |
| Dia da semana | String | 0 a 6 (0 ou 7 equivalem ao domingo); |
| Comando | String | script ou comando a ser executado | -->

Exemplo

```
/add-task.php?time=00+23+31+12+7&task=echo+hello
```

Em caso de sucesso:

```js
{
  "status": "Tarefa agendada com sucesso."
}
```

Em caso de erro:

```js
{
  "status": "Tarefa não agendada"
}
```

Para executar tal ação é necessário executar o comando:

```
$ crontab -l > crontab-temp
$ echo '00 23 31 12 7 echo hello' >> crontab-temp
$ crontab crontab-temp
```

> **Obs.:** O arquivo crontab-temp deverá estar com as permissões de escrita para todos os usuários.

Para validar a adição da nova tarefa, liste as tarefas alocadas e verifique se a nova tarefa foi incluida.

### Listar Tarefas

Este serviço listará todas as tarefas agendadas de acordo com a sintaxe do próprio crontab.

```
GET /api/list-tasks.php
```

Exemplo

```
GET /api/list-tasks.php
```

Em caso de sucesso:

```js

"cron" :
      [
          { "0" : [
                  "minute" :	"00"
                  "hour" :	"23"
                  "day" :	"31"
                  "month" :	"12"
                  "weekDay" :	"7"
                  "task" :	"echo hello"
                  ]
          }
      ]
```

Em caso de erro:

```js
{
  "erro": "Problema ao listar as tarefas."
}
```

Para executar tal ação é necessário executar o comando:

```
$ crontab -l
```

Para validar verique se o conteudo do `JSON` gerado corresponde ao do `crontab -l`.

### Remover Tarefas

Este serviço tem a finalidade de remover uma tarefa agendada na lista do crontab.

Para executar tal ação é necessário executar o comando:

```
$ sed '/indice/d' crontab
```
