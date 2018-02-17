function createRow(cron, flag) {
  return `<tr data-id="${flag}">
    <td scope="row">${cron.minute}</th>
    <td>${cron.hour}</td>
    <td>${cron.day}</td>
    <td>${cron.month}</td>
    <td>${cron.weekDay}</td>
    <td>${cron.task}</td>
    <td><input type="checkbox" class="form-check-input"></td>
    <td><input type="checkbox" class="form-check-input"></td>
  </tr>`
}

const showTasksUrl = 'api/show-taks.php'
const tasksTable = document.querySelector('table#tasks tbody')
let tasks

fetch(showTasksUrl)
  .then(res => res.json())
  .then(json => {
    tasks = json
    let crons = ''
    let flag = 0;
    for(let cron of tasks.crons) {
      crons += createRow(cron, flag++)
    }
    tasksTable.innerHTML = crons
  })
