import { store, getContext } from "@wordpress/interactivity";

const { state } = store("dev-hours/quiz", {
  state: {
    selected: null,
    get isOpen() {
      const ctx = getContext();
      return state.selected === ctx.id;
    },
    get toggleText() {
      const { isOpen, closeText, openText } = state;
      return isOpen ? closeText : openText;
    },
  },
  actions: {
    toggle: () => {
      const ctx = getContext();
      state.selected = state.selected !== ctx.id ? ctx.id : null;
    },
  },
});
