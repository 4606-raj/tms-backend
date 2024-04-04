import ticketService from "../services/tickets.service";
import showSwal from "@/mixins/showSwal.js";

const initialState = {
  tickets: []
};

export const tickets = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await ticketService.fetchAll();
      commit("setTickets", response);
    },
    async createTicket({ commit }, ticket) {
      const response = await ticketService.createTicket(ticket);
      commit("setTickets", response);

      showSwal.methods.showSwal({
        message: "Ticket created successfully!",
      });
    },

  },
  mutations: {
    setTickets(state, payload) {
      if (Array.isArray(payload)) {
        state.tickets = payload;
      }
      else {
        state.tickets.push(payload)
      }
    },
  },

  getters: {
    getAll(state) {
      return state.tickets;
    },
  },
};
