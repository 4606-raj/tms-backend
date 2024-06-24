import userService from "../services/users.service";
import showSwal from "@/mixins/showSwal.js";

const initialState = {
  users: [],
  ppaUsers: [],
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

    async create({ commit }, payload) {
      let response = await userService.create(payload);
      // console.log(response);
      commit('setUsers', response);

      return { success: true };
    },
    async fetchPpaDetails({ commit }) {      
      let response = await userService.fetchPpaDetails();
      
      commit("setPpaUsers", response);
    },

    async setCurrentPpaUsers({ commit }, payload) {
      commit('setPpaCurrentUsers', payload)
    }
    
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
    setPpaUsers(state, payload) {
      if (Array.isArray(payload)) {
        state.ppaUsers = payload;
      }
      else {
        state.ppaUsers.push(payload)
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
    getPpaAll(state) {
      return state.ppaUsers;
    },
    getCurrentPpaUsers(state) {
      return state.PpaCurrentUsers;
    },
  },
};
