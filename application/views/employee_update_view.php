<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>CRUD</title>
</head>
<style>
* {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}

:root {
  --orange: #EC6707;
  --green: #7FB06F;
  --special-font: 'Montserrat', sans-serif;

  --rounded-1: 4px;
  --sp1: 1rem;
  --sp2: 2rem;
}

/*
=====================
    Global Styles
=====================
*/

body {
  font-family: var(--special-font);
  font-size: 100%;
  /* padding: 4vw 7vw; */
}

/*
==============
    Layout    
==============
*/

.main-header {
  display: flex;
  flex-flow: row nowrap;
  justify-content: space-between;
  background-color: var(--orange);
  padding: 1rem 2rem;
}

.brand-name {
  color: white;
  font-size: 1.3rem;
  font-weight: bold;
}

.hamburger {
  width: 24px;
}

.line {
  margin: .4em 0;
}

.hamburger::before, .line, .hamburger::after {
  display: block;
  content: "";
  background-color: white;
  height: 2px;
}
.hamburger::after {
  width: 50%;
}

main {
  display: flex;
  flex-flow: row wrap;
  gap: 1rem;
  margin: 2rem;
}

.container {
  box-shadow: 0 1px 4px gray;
  border-radius: .5rem;
  padding: 1rem;
}
.left-container {
  flex: 1 1 30%;
}
.right-container {
  flex-grow: 1; 
}

.container .title {
  display: inline-block;
  border-radius: .5rem;
  background-color: orange;
  color: white;
  font-size: 1.3rem;
  padding: .25em 1em;
  margin-bottom: 1rem;
}

.forms > * {
  width: 100%;
  margin-bottom: .5rem;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th, td {
  text-align: left;
  padding: .5em;
  border: 1px solid #ddd;
}
table tr:nth-child(even) {
  background-color: #ddd;
}
</style>

<body>

  <header class="main-header">
    <span class="brand-name">multitest</span>

    <div class="hamburger">
      <div class="line"></div>
    </div>
  </header>

  <main>
    <div class="container left-container">
      <h2 class="title">Nuevo empleado</h2>

      <?php echo validation_errors(); ?>
      <?php echo form_open("employee/create", array('class'=>'forms')) ?>
      <?php foreach($employees as $employee) : ?>
        <?php echo form_input(array('name'=>'dni', 'id'=>'dni', 'placeholder'=>'DNI empleado', 'value'=>$employee->dni)) ?>
        <?php echo form_input(array('name'=>'name', 'id'=>'name', 'placeholder'=>'Nombre empleado', 'value'=>$employee->name)) ?>
        <?php echo form_input(array('name'=>'lastname', 'id'=>'lastname', 'placeholder'=>'Apellido empleado', 'value'=>$employee->lastname)) ?>
        <?php echo form_submit('submit-user', 'Guardar cambios', array('class'=>'btn-submit')) ?>
        <?php echo form_close() ?>
      <?php endforeach; ?>
    </div>
</main>

</body>
</html>