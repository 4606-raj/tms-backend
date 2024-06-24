import ticketService from "../services/tickets.service";
import showSwal from "@/mixins/showSwal.js";

const initialState = {
  tickets: [],
  searchTicket: [],
  pagination: {
    current_page: 1,
    // Other pagination properties such as total_pages, per_page, etc.
  },
};


export const tickets = {
  namespaced: true,
  state: initialState,
  actions: {
    /* ----------All tickets------------------*/
    async fetchAll({ commit }, payload) {      
      let response = await ticketService.fetchAll(payload);
      
      let {data, ...pagination} = response;
      
      commit("setTickets", data);
      commit("updatePagination", pagination);
    },
    /* ----------show ticket------------------*/
    async ticketDetail({ commit }, payload) {      
      let response = await ticketService.ticketDetail(payload);
      
      let {data} = response;
      
      commit("setTickets", data);
     
    },
    /* ----------search ticket------------------*/
    async search({ commit }, searchParams) { 
    // try {     
        const response = await ticketService.search(searchParams);
        console.log(response,'ggg');
        commit('setSearchTicket', response);
      // } catch (error) {
      //   console.error('Error searching tickets:', error);
      // }
     
    },
    /* ----------create ticket------------------*/
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
    setSearchTicket(state, tickets) {
      state.searchTicket = tickets;
    },

  updatePagination(state, payload) {
    state.pagination = payload;
  },

},



  getters: {
    getAll(state) {
      return state.tickets;
    },
    getPagination(state) {
      return state.pagination;
    },
    searchTicket(state) {
      return state.searchTicket;
    },
    
  },
};
