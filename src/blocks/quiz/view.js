import { store, getContext } from "@wordpress/interactivity";

const { state } = store("dev-hours/quiz", {
  state: {
    selected: null,
    get isOpen() {
      const ctx = getContext();
      return state.selected === ctx.id;
    },
    get toggleText() {
      return state.isOpen ? "Close" : "Open";
    },
  },
  actions: {
    toggle: () => {
      const ctx = getContext();
      state.selected = state.selected !== ctx.id ? ctx.id : null;
    },
  },
});
