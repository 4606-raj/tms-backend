import authoritiesService from "../services/authorities.service";

const initialState = [];

export const authorities = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await authoritiesService.fetchAll();
      commit("setAuthorities", response);
    },

  },
  mutations: {
    setAuthorities(state, payload) {
      state.authorities = payload;
    },
  },

  getters: {
    getAll(state) {
      return state.authorities;
    },
  },
};
