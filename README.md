# API Doc

- [Adiconar Tarefa](#adiconar-tarefa)
- [Listar Tarefa ](#listar-tarefa)
- [Remover Tarefa](#remover-tarefa)

## Adiconar Tarefa

Esse serviço tem a finalidade de adicionar tarefas a serem executadas pelo Cron

### PARAMETROS

```
/api/add-task.php?time=:time&com=:command

```
Parametros

| Name | Tipo | Descrição |
|-|-|-|
| :time | String | Min. 0-59; Hora 0-23; Dia do mês 0-31; Mês 0-12; Dias da sem. 0-7; * para execução contínua  [Manual Crontab](http://man7.org/linux/man-pages/man5/crontab.5.html) |
| :command | String | Script ou comando a ser executado|

Exemplo

```
/add-task.php?time=00+23+31+12+7&com=echo+hello
```

Em caso de sucesso

```js
{
  "status": "Tarefa agendada com sucesso."
}
```

Em caso de erro

```js
{
  "status": "Tarefa não agendada"
}
```

### AÇÃO

Para executar tal ação é necessário executar o comando:

```
$ crontab <<EOF
00 09 * * 1-5 echo hello
EOF
```

##Listar Tarefas

##Remover Tarefas
