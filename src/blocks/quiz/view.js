import { store, getContext, getElement } from "@wordpress/interactivity";

const { state } = store("dev-hours/quiz", {
  state: {
    get isOpen() {
      const ctx = getContext();
      return state.selected === ctx.id;
    },
    get toggleText() {
      const { isOpen, closeText, openText } = state;
      return isOpen ? closeText : openText;
    },
    get isActive() {
      const { thisAnswer, id } = getContext();
      return state.quizzes[id].current === thisAnswer;
    },
  },
  actions: {
    toggle: () => {
      const ctx = getContext();
      state.selected = state.selected !== ctx.id ? ctx.id : null;
    },
    closeOnEsc: (event) => {
      if (event.key === "Escape") {
        state.selected = null;
        const { ref } = getElement();
        ref.querySelector('button[aria-controls^="quiz-"]').focus();
      }
    },
    answerBoolean: () => {
      const ctx = getContext();
      const { id, thisAnswer } = ctx;
      const quiz = state.quizzes[id];
      quiz.current = quiz.current !== thisAnswer ? thisAnswer : null;
    },
    answerInput: (event) => {
      const { id } = getContext();
      state.quizzes[id].current = event.target.value || null;
    },
  },
  callbacks: {
    focusOnOpen: () => {
      const { ref } = getElement();
      if (state.isOpen) {
        ref.focus();
      }
    },
  },
});
