import rolesService from "../services/authorities.service";

const initialState = [];

export const roles = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await rolesService.fetchAll();
      commit("setRoles", response);
    },

  },
  mutations: {
    setRoles(state, payload) {
      state.roles = payload;
    },
  },

  getters: {
    getAll(state) {
      return state.roles;
    },
  },
};
