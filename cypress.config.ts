const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
    env:{
        username: "nikisantos@yahoo.com",
        password: "bulalo114"
    },
    baseUrl: "http://localhost:8000/",
    specPattern: "cypress/**/*.spec.ts",
    watchForFileChanges: false,
  },
});
