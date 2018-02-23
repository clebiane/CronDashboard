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
| Name | Tipo | Descrição |
|-|-|-|
| Minuto | String | entre 0 a 59 minutos; * para todos os minutos |
| Hora | String | 0 a 23 horas; * para todas as horas|
| Dia do mês | String | 0 a 31; * para todos os dias|
| Mês | String |  0 a 12; * para todos os meses |
| Dia da semana | String | 0 a 6 (0 ou 7 equivalem ao domingo); |
| Comando | String | script ou comando a ser executado |

Exemplo

```
/api/add-task.php?minute=00&hour=23&day=31&month=12&weekDay=7&task=echo+hello
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
$ crontab <<EOF
    ${crontabContent}
  EOF"
```

Para validar a adição da nova tarefa, liste as tarefas alocadas e verifique se a nova tarefa foi incluida.

### Listar Tarefas

Este serviço listará todas as tarefas agendadas inseridas no arquivo crontab de acordo.


Exemplo

```
GET /api/show-taks.php
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

### Remover Tarefas

Este serviço tem a finalidade de remover uma tarefa agendada na lista do crontab.

Exemplo

```
GET /api/rm-task.php?remove=1
```

Para executar tal ação é necessário executar o comando:

```
$ ("crontab <<EOF
    ${crontabContent}
  EOF")
```
### Screenshots
