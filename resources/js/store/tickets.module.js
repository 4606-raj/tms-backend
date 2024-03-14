import ticketService from "../services/tickets.service";

const initialState = [];

export const tickets = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await ticketService.fetchAll();
      
      commit("setTickets", response);
    },

  },
  mutations: {
    setTickets(state, payload) {
      state.tickets = payload;
    },
  },

  getters: {
    getAll(state) {
      return state.tickets;
    },
  },
};
