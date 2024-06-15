const fs = require('fs');
const path = require('path');
const readline = require('readline');

// Функція для читання введення з консолі
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

// Функція для запиту назви проекту
function askProjectName() {
  rl.question('Enter project name (without spaces or symbols): ', (projectName) => {
    if (!/^[a-zA-Z0-9]+$/.test(projectName)) {
      console.log("Project name must be alphanumeric and without spaces or symbols. Please try again.");
      askProjectName(); // Повторний запит
    } else {
      setupProject(projectName);
    }
  });
}

// Функція для налаштування проекту
function setupProject(projectName) {
  // Шляхи до файлів та папок
  const themeFolder = path.join(__dirname, '..', 'themes', 'Theme-name');
  const newThemeFolder = path.join(__dirname, '..', 'themes', projectName);
  const styleFilePath = path.join(themeFolder, 'style.css');
  const otherFilePath = path.join(__dirname, 'gulpfile.js');  // Вкажіть правильний шлях до файлу у папці src, де потрібно зробити заміну

  // Зміна контенту в style.css
  const styleContent = `/*
Theme Name: ${projectName}
Author: BLACKBOOK.dev Team
Version: 1.0
*/`;

  fs.writeFile(styleFilePath, styleContent, (err) => {
    if (err) throw err;

    // Перейменування папки
    fs.rename(themeFolder, newThemeFolder, (err) => {
      if (err) throw err;

      // Заміна рядка в іншому файлі
      fs.readFile(otherFilePath, 'utf8', (err, data) => {
        if (err) throw err;

        const result = data.replace(/false; \/\/'..\/themes\/velena'/g, `'../themes/${projectName}'`);

        fs.writeFile(otherFilePath, result, 'utf8', (err) => {
          if (err) throw err;

          console.log("Project setup completed successfully.");
          rl.close();
        });
      });
    });
  });
}

// Вітальне повідомлення
console.log("Welcome in the new BLACKBOOK (https://blackbook.dev) empty project. To start press 'Enter'");
rl.question('', () => {
  askProjectName(); // Перший запит назви проекту
});
