import userService from "../services/users.service";
import showSwal from "@/mixins/showSwal.js";

const initialState = {
  users: [],
  pagination: {
    current_page: 1,
    // Other pagination properties such as total_pages, per_page, etc.
  },
};


export const users = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }, payload) {      
      let response = await userService.fetchAll(payload);
      
      let {data, ...pagination} = response;
      
      commit("setUsers", data);
      commit("updatePagination", pagination);
    },
    async search({ commit }, payload) {      
      let response = await UserService.search(payload);
      
      let {data} = response;
      
      commit("setUsers", data);
     
    },
  },
  mutations: {
    setUsers(state, payload) {
      if (Array.isArray(payload)) {
        state.users = payload;
      }
      else {
        state.users.push(payload)
      }
    },

  updatePagination(state, payload) {
    state.pagination = payload;
  },

},



  getters: {
    getAll(state) {
      return state.users;
    },
    getPagination(state) {
      return state.pagination;
    },
  },
};
