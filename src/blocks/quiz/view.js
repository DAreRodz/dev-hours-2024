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
      const { answer, thisAnswer } = getContext();
      return answer === thisAnswer;
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
    answer: () => {
      const ctx = getContext();
      ctx.answer = ctx.thisAnswer;
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
