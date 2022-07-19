export default {
  install: (app, options) => {
    app.component(
      "v-page-editor",
      require("./components/page-editor.vue").default,
    );
  },
};
