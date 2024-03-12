import { store } from "@wordpress/interactivity";

const { state } = store("dev-hours/quiz", {
  state: {
    get answered() {
      return Object.values(state.quizzes).filter((v) => v.current !== null)
        .length;
    },
  },
});
