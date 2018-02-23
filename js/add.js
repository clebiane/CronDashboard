{
  const task = document.querySelector('input[name="task"]')
  const minute = document.querySelector('input[name="minute"]')
  const hour = document.querySelector('input[name="hour"]')
  const day = document.querySelector('input[name="day"]')
  const month = document.querySelector('input[name="month"]')
  const weekDay = document.querySelector('input[name="weekDay"]')
  const submit = document.querySelector('form button')

  submit.addEventListener('click', event => {
    event.preventDefault();
    const url = `api/add-task.php?minute=${minute.value}&hour=${hour.value}&day=${day.value}&month=${month.value}&weekDay=${weekDay.value}&task=${task.value}`
    fetch(url)
      .then(res => location.href = 'listar.html')
  })
}
