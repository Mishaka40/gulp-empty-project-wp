# Gulp webpack with Docker ACF Wordpress



## Getting started

Use latest NODE version

Then:
1. You must be in the /FRONT/ folder (cd FRONT)
2. Install dependencies ```npm i ```
3. Run theme initialization ```node setup.js ```
4. Start frontend ```gulp ```
5. Start backend ```cd .. ``` and ```docker-compose up```


## Webpack works with Wordpress
You don't need to stop using SCSS and other features, just run the theme initialization script ```node setup.js```

## Separated JS and CSS
**JS:**

All the necessary functions or code for every page needs to be located here:

`src/js/main.js`

Code for each section are located in the section's folder:

`src/js/sections/*.js`

**CSS:**

The most important styles or styles that are used on each page needs to be located in critical.css:

`src/scss/critical.scss`

Styles that are frequently used but not as important on every page as critical.css and that are not sections should be written in common.css:

`src/scss/common.scss`

Styles for each section on each page should be in the section's folder:

`src/scss/sections/*.scss`

## Plugins
There is also a special folder for plugins. They will not be merged into one file but will be separate and should be connected on each page as needed.

`src/plugins/css/*.css`

`src/plugins/js/*.js`



_BLACKBOOK.dev webpack_