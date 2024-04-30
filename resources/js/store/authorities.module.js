import authorityService from "../services/authorities.service";

const initialState = [];

export const authorities = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await authorityService.fetchAll();
      
      commit("setAuthorities", response);
    },

  },
  mutations: {
    setAuthorities(state, payload) {
      state.channels = payload;
    },
  },

  getters: {
    getAll(state) {
      return state.authorities;
    },
  },
};
