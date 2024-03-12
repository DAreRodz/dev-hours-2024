import { store, getContext } from "@wordpress/interactivity";

store("dev-hours/quiz", {
  actions: {
    toggle: () => {
      const ctx = getContext();
      ctx.isOpen = !ctx.isOpen;
    },
  },
});
