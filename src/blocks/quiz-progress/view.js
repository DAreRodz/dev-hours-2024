import { store } from "@wordpress/interactivity";

const { state } = store("dev-hours/quiz", {
  state: {
    get answered() {
      return Object.values(state.quizzes).filter((v) => v.current !== null)
        .length;
    },
    get allAnswered() {
      return state.answered === Object.keys(state.quizzes).length;
    },
  },
});
