function createRow(cron) {
  return `<tr>
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

fetch(showTasksUrl)
  .then(res => res.json())
  .then(tasks => {
    let crons = ''
    for(let cron of tasks.crons) {
      crons += createRow(cron)
    }
    tasksTable.innerHTML = crons
  })
